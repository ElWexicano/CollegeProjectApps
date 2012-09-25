package servlets;

import beans.BeanUtilities;
import beans.Question;
import beans.QuizPage;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.Enumeration;
import java.util.List;
import javax.servlet.ServletConfig;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet({"/addQuestion"})
public class QuestionSetter extends QuizPage {
	
	List<Question> questions;
	String quizLocation = "/home/iamshanedoyle/Quiz";
	String questionBank = quizLocation+"/questions.xml";

	public void doGet(HttpServletRequest request, HttpServletResponse response)
	    throws ServletException, IOException
	{
		questions = questionReader(questionBank);
		
		Question newQuestion = new Question();
		
		System.out.println();
		
		BeanUtilities.populateBean(newQuestion, request);
		
        questions.add(newQuestion);

        questionWriter(questionBank, questions);
        
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
        
		StringBuffer content = new StringBuffer("Successfully Added Question");

		content.append("<h1>Question Added to Question Bank</h1>\n")
		.append(newQuestion.display());
		
		response.setHeader("Refresh", "5; questionForm");

		setTitle("Successfully Added Question");
		setContent(content.toString());
		
		out.println(pageContent());
	}
	
}