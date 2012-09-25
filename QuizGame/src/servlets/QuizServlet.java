package servlets;

import beans.Question;
import beans.QuizPage;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.HashMap;
import java.util.List;
import javax.servlet.ServletConfig;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet({"/quizServlet"})
public class QuizServlet extends QuizPage {
	
	List<Question> quiz;
	String quizLocation = "/home/iamshanedoyle/Quiz";
	String quizFile = quizLocation+"/quiz.xml";
	HashMap<String, Integer> correctAnswers;

	public void doGet(HttpServletRequest request, HttpServletResponse response)
	    throws ServletException, IOException
	{
		quiz = questionReader(quizFile);
		
		correctAnswers = new HashMap<String, Integer>();
		HttpSession session = request.getSession(true);
		StringBuffer questions;
		
		if(quiz.size()>0){
			questions = createQuiz();
			session.setAttribute("correctAnswers",correctAnswers);
		} else {
			questions = new StringBuffer("No Quiz Available");
		}

		StringBuffer content = new StringBuffer("<h1>Take the Quiz</h1>\n");

		content.append(questions.toString());
	
		setTitle("Take The Quiz");
		setContent(content.toString());
		
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		out.println(pageContent());
	}
	
	private StringBuffer createQuiz() {
		StringBuffer temp = new StringBuffer("<form action='quizResults' method='Post'>\n<fieldset>\n<legend>Quiz</legend>\n");
		int x = 1, i;
		
		for(Question question : quiz){
			
			temp.append("<b><label>Question ").append(x)
			.append(": ").append(question.getQuestion())
			.append("?</label></b><br>\n");
			
			i = 0;
			while(question.getAnswers().size() > i){
				
				temp.append("<input type='radio' name='question-").append(x)
				.append("'").append(" value='").append(i).append("'");
				
				if(i==0){
					temp.append(" checked");
				}
				
				temp.append(">\n")
				.append(question.getAnswer(i)).append("<br>");
				
				i++;
			}
			
			correctAnswers.put("question-"+x, question.getCorrectAnswer());
			temp.append("<br>\n");
			x++;
		}
		
		temp.append("<input type='submit'>\n</fieldset>\n</form>\n");
		return temp;
	}

}