<%--
 Licensed to the Apache Software Foundation (ASF) under one or more
  contributor license agreements.  See the NOTICE file distributed with
  this work for additional information regarding copyright ownership.
  The ASF licenses this file to You under the Apache License, Version 2.0
  (the "License"); you may not use this file except in compliance with
  the License.  You may obtain a copy of the License at

      http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
--%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Error Page For Examples</title>
</head>
<body>
	
	<div class="main">
	
		<div class="header">
	
			<span class="title">Online Quiz Game</span> | <span class="motto">Test Your Knowledge</span>
			<br><span class="home"><a href="index.html">Home</a></span>
		</div>
	
		<div class="content">
			
			<h1>Login Failed</h1>
			
			Invalid username and/or password, please try
			<a href='<%= response.encodeURL("login.jsp") %>'>again</a>.<br>
			Or go back to <a href='<%= response.encodeURL("index.html") %>'>home page</a>
			
		</div>
		
		<div class="footer">
			Created by Shane Doyle (20012081) | Hons BSc in Software Systems Development
		</div>

	</div>

</body>
</html>