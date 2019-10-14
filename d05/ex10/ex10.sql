SELECT
	film.title AS 'Title',
	film.summary AS 'Summary',
	film.prod_year
FROM film, genre
WHERE
	film.id_genre = genre.id_genre
	AND	genre.name = 'erotic'
ORDER BY prod_year DESC;
