package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;
import java.util.Enumeration;
import java.util.HashMap;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import beans.QuizPage;

@WebServlet({"/quizResults"})
public class QuizResults extends QuizPage {
	int answersCorrect;
	int numberQuestions;
	int score;
	
	@SuppressWarnings("unchecked")
	public void doPost(HttpServletRequest request, HttpServletResponse response)
    throws ServletException, IOException {
		
		answersCorrect = 0;
		numberQuestions = 0;
		score = 0;
		
		HttpSession session = request.getSession(true);
		HashMap<String, Integer> correctAnswers = (HashMap<String, Integer>) session.getAttribute("correctAnswers");
		
		checkAnswers(request, correctAnswers);


		StringBuffer content = new StringBuffer("<h1>Quiz Results</h1>\n");

		content.append(displayResult()).append("\n");

		
		if(Integer.parseInt(ServletUtilities.getCookieValue(request, "userScore", "0"))>score){
			content.append("<p>You scored less than your last attempt. As a result you cannot play the quiz again.");
		} else {
			content.append(displayPlayAgain());
		}

		Cookie quizScoreCookie = new Cookie("userScore", Integer.toString(score));
		quizScoreCookie.setMaxAge(60*60*24*7);
		response.addCookie(quizScoreCookie);
		
		Cookie quizAccessedCookie = new Cookie("quizAccessDate", Long.toString(new java.util.Date().getTime()));
		quizAccessedCookie.setMaxAge(60*60*24*7);
		response.addCookie(quizAccessedCookie);

		setTitle("Quiz Results");
		setContent(content.toString());
		
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		out.println(pageContent());
	}
	
	private void checkAnswers(HttpServletRequest request,
			HashMap<String, Integer> correctAnswers) {
		
		Enumeration<String> parameterNames = request.getParameterNames();
		while(parameterNames.hasMoreElements()){
			String parameterName = (String)parameterNames.nextElement();

			if(Integer.parseInt(request.getParameter(parameterName))==correctAnswers.get(parameterName)){
				answersCorrect++;
			}

			numberQuestions++;
		}
		
		score = (int)( ( ( (double)answersCorrect ) / numberQuestions ) * 100 );
	}
	
	private String displayResult(){
		StringBuffer result = new StringBuffer("<p>You got ");
		result.append(Integer.toString(answersCorrect)).append(" correct out of ")
		.append(Integer.toString(numberQuestions)).append(" Questions<br>Your Score: <b>")
		.append(Integer.toString(score)).append("%</b></p>");
		
		return result.toString();
	}
	
	
	private String displayPlayAgain(){
		StringBuffer temp = new StringBuffer("");
		
		temp.append("Play Again? <a href=\"quizServlet\">Yes</a> or <a href=\"index.html\">No</a>")
		.append("<p>Note. If you play again and you score lower than ").append(score).
		append("% you will not be allowed to play this quiz again.</p>");
		
		return temp.toString();
	}
}