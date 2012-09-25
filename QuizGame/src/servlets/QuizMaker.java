package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.List;
import javax.servlet.ServletConfig;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import beans.Question;
import beans.QuizPage;

@WebServlet({"/quizCreator"})
public class QuizMaker extends QuizPage {
	String quizLocation = "/home/iamshanedoyle/Quiz";
	String quizFile = quizLocation+"/quiz.xml";
	String questionBank = quizLocation+"/questions.xml";
	String formData;
	Integer pos, level;
	List<Question> questions, quiz;
	
	public void init(ServletConfig config) throws ServletException {
		questions = questionReader(questionBank);
	}

	public void destroy() {  
		if(quiz.size()>1){
			questionWriter(quizFile,quiz);
		}
	}
	
	@SuppressWarnings("unchecked")
	public void doGet(HttpServletRequest request, HttpServletResponse response)
    throws ServletException, IOException {
		HttpSession session = request.getSession(true);

		if(request.getParameter("option")!=null) {
			
			String option = request.getParameter("option");
			
			if(option.equals("Add")) {
				quiz.add(questions.get(pos));
				pos++;
				updateSession(session);
			} else if(option.equals("Skip")) {
				pos++;
				updateSession(session);
			} else if(option.equals("Up")) {
				level += level < 4 ? 1 : 0;
				updateSession(session);
				
			} else if(option.equals("Finished")) {
				session.invalidate();
				destroy();
				response.sendRedirect("quizCreated.html");
			}

		}
		
		pos = (Integer)session.getAttribute("questionPosition");
		level = (Integer)session.getAttribute("questionLevel");
		quiz = (List<Question>)session.getAttribute("quiz");
		
		if(pos==null) {
			pos = new Integer(0);
		}
		if(level==null) {
			level = new Integer(1);
		}
		if(quiz==null) {
			quiz = new ArrayList<Question>();
		}
		
		changeDifficulty();
		if(questions.size() > pos){
			while(questions.get(pos).getDifficulty()!=level){
				pos++;
				changeDifficulty();
			}
			formData = questions.get(pos).display();
		}
		
		StringBuffer content = new StringBuffer("<h1>Quiz Creator</h1>\n");

		content.append(quizCreatorForm()).append(questionsInQuiz());
	
		setTitle("Quiz Creator");
		setContent(content.toString());
		
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		out.println(pageContent());
	}
	
	protected void changeDifficulty() {
		if((questions.size()-1) < pos) {
			level = level > 4 ? 1 : level + 1;
			pos = 0;
		}
	}
	
	protected void updateSession(HttpSession session){
		session.setAttribute("questionPosition",pos);
		session.setAttribute("questionLevel",level);
		session.setAttribute("quiz",quiz);
	}
	
	protected String quizCreatorForm() {
		StringBuffer form = new StringBuffer("<form action='quizCreator'>\n<fieldset>");
		
		form.append("<legend>Question</legend>\n");
		
		if(formData != null) {
			form.append(formData).append("<input type='submit' name='option' value='Add'>\n")
			.append("<input type='submit' name='option' value='Skip'>\n")
			.append("<input type='submit' name='option' value='Up'>\n")
			.append("<input type='submit' name='option' value='Finished'>\n");
		} else {
			form.append("None Available");
		}
		
		form.append("</fieldset>\n</form>\n");

		return form.toString();
	}
	
	protected String questionsInQuiz(){
		
		StringBuffer temp = new StringBuffer("<pre><b>Questions in current quiz</b><br>");
		
		int t = 1;
		for(Question q : quiz){
			temp.append("<b>").append(t).append(". </b>").append(q.getQuestion()).append("<br>");
			t++;
		}
		
		temp.append("</pre>");
		
		return temp.toString();
	}
}