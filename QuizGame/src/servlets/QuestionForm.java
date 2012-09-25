package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.List;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import beans.BeanUtilities;
import beans.Question;
import beans.QuizPage;

@WebServlet({"/questionForm"})
public class QuestionForm extends QuizPage {
	
	String[] difficultyLevels = {"Easy","Normal","Hard","Very Hard"};
	
	public void doGet(HttpServletRequest request, HttpServletResponse response)
	    throws ServletException, IOException {
			
		Question question = new Question();
		BeanUtilities.populateBean(question, request);
		
		if(question.isComplete()) {
			response.sendRedirect("addQuestion?"+request.getQueryString());
		}
		
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
        
		setTitle("Question Setter");
		setContent(displayForm().toString());
		
		out.println(pageContent());
	}

	
	private StringBuffer displayForm() {
		StringBuffer content = new StringBuffer("<p>To create a question please fill in all of the text boxes below</p>\n");
		
		content.append("<form action=\"questionForm\" method=\"get\">\n<fieldset>\n")
		.append("<legend>Create a Question</legend>\n<label for=\"difficulty\">Difficulty</label>\n");
		
		StringBuffer tempDifficulty = new StringBuffer("<select name=\"difficulty\" id=\"difficulty\">\n");
		StringBuffer tempAnswers = new StringBuffer();
		StringBuffer tempCorrect = new StringBuffer("<label for=\"correctAnswer\">Correct Answer</label>\n");
		
		tempCorrect.append("<select name=\"correctAnswer\" id=\"correctAnswer\">\n");
		
		for(int i = 1; i <= 4; i++) {
			tempDifficulty.append(selectOption("", difficultyLevels[i-1], Integer.toString(i), false));
			tempCorrect.append(selectOption("", "Answer"+Integer.toString(i), Integer.toString(i-1), false));
			tempAnswers.append(inputElement("", "Answer"+Integer.toString(i), "", false));
		}
		
		tempDifficulty.append("</select><br>\n");
		tempCorrect.append("</select><br>\n");
		
		content.append(tempDifficulty.toString()).append(inputElement("", "Question", "", false)).append("\n")
		.append(tempAnswers.toString()).append(tempCorrect.toString())
		.append("<input type=\"submit\" value=\"Add Question\">\n</fieldset>\n</form>\n");
		return content;
	}
	

	
}
