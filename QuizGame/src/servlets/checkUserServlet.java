package servlets;

import java.io.File;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import beans.QuizPage;

@WebServlet("/playTheQuiz")
public class checkUserServlet extends QuizPage {
	
	String quizLocation = "/home/iamshanedoyle/Quiz";
	String quiz = quizLocation+"/quiz.xml";
	
	File quizFile = new File(quiz);
	
	protected void doGet(HttpServletRequest request, HttpServletResponse response) 
			throws ServletException, IOException {
			
			String score = ServletUtilities.getCookieValue(request, "userScore", null);
			String quizAccessDate = ServletUtilities.getCookieValue(request, "quizAccessDate", "1");
			HttpSession session = request.getSession();
			
			if(score==null || (quizFile.lastModified() > Long.parseLong(quizAccessDate))){
				response.sendRedirect("quizServlet");
				
				Cookie quizScoreCookie = new Cookie("userScore", null);
				quizScoreCookie.setMaxAge(1);
				response.addCookie(quizScoreCookie);
			}

			StringBuffer content = new StringBuffer("<h1>Quiz Unavailable</h1>\n");
			content.append("<p>You have already tried this quiz.<br></p>\n")
			.append("Last time you scored: <b>").append(score)
			.append("%</b><br>\n<p>Please wait till a new quiz is created.<br>\n")
			.append("Go back to <a href=\"index.html\">home page</a></p>\n").append("</body>\n</html>\n");
			
			setTitle("Quiz Results");
			setContent(content.toString());
			
			response.setContentType("text/html");
			PrintWriter out = response.getWriter();
			out.println(pageContent());
		}
	
}
