SELECT COUNT(id_last_film) AS 'movies'
FROM `member`
WHERE
	(date_last_film > '2006-10-30'
	AND date_last_film < '2007-07-27')
	OR (MONTH(date_last_film) = '12'
	AND	DAY(date_last_film) = '24');

SELECT count(`date`) AS 'movies'
FROM member_history
WHERE
	(DATE(`date`) >= '2006-10-30'
	AND DATE(`date`) <= '2007-07-27')
	OR (MONTH(`date`) = 12 AND DAY(`date`) = 24);
