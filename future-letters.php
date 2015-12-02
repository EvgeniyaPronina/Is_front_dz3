<!DOCTYPE html>
<html lang="ru-RU" class="window_settings">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>

<?php //include_once 'mail.php';?>
		<div class="page-wrap">
			<h1 class='header'>Отправляем письма в будущее</h1>
			<form class='form' action='checkform.php' id='my-form' method="post">
				<div class="inputs-wrap">
					<label for="email">E-mail:</label>
					<input class='input-email' type="email" name='email' placeholder='E-mail' required>
					<div class="date-time-wrap">
						<label class='date-time-label' for="date">Дата и время (московское), в которые должно быть отправлено сообщение:</label>
						<input class='input-date' type="date" name='date' placeholder='Укажите дату' required>
						<select class='input-time' name="time" id="">
							<option>0:00</option>
							<option>1:00</option>
							<option>2:00</option>
							<option>3:00</option>
							<option>4:00</option>
							<option>5:00</option>
							<option>6:00</option>
							<option>7:00</option>
							<option>8:00</option>
							<option>9:00</option>
							<option>10:00</option>
							<option>11:00</option>
							<option>12:00</option>
							<option>13:00</option>
							<option>14:00</option>
							<option>15:00</option>
							<option>16:00</option>
							<option>17:00</option>
							<option>18:00</option>
							<option>19:00</option>
							<option>20:00</option>
							<option>21:00</option>
							<option>22:00</option>
							<option>23:00</option>
						</select>
					</div>
					<label for="message">Ваше сообщение:</label>
					<textarea class='input-message' name='message' id="" placeholder='Ваше сообщение'></textarea>
					<div class='capcha-cont'></div>
					<div class="g-recaptcha" data-sitekey="6LfBKBITAAAAABYatwXgEZKDSvlXJ9YFUw6EFwqc"></div>
					<input class="submit" type="submit">
				</div>
				<div id="message-div"></div>
				<div id="error-div"></div>
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script src='js/main.js'></script>
	</body>
</html>
