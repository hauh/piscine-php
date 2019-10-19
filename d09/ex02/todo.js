function get_previous_todos()
{
	var cookies = document.cookie.split(';');

	for (var i = 0; i < cookies.length; i++)
	{
		var c = cookies[i];
		c = c.trim();
		if (c.indexOf("todo=") == 0) {
			return (c.substring(c.indexOf("=") + 1));
		}
	}
	return ("");
}

function set_todos_from_cookies()
{
	var prev_todos = get_previous_todos();
	var arr_todos = prev_todos.split("///");
	
	arr_todos.reverse();
	arr_todos.forEach(elem => add_todo(elem));
}

function save_todos_to_cookies()
{
	var todo_list = document.getElementsByClassName("todo");
	var saved = "";

	for(var i = 0; i < todo_list.length; i++) {
		saved += todo_list.item(i).innerHTML + "///";
	}
	document.cookie = "todo=" + saved;
}

function add_todo(name)
{
	if (name)
	{
		var todo_list = document.getElementById("ft_list");
		var new_div = document.createElement("div");
		new_div.setAttribute("class", "todo");
		new_div.setAttribute("onclick", "remove_todo(this)");
		new_div.innerHTML = name;
		todo_list.insertBefore(new_div, todo_list.firstChild);
	}
}

function remove_todo(elem)
{
	if (confirm("Delete this?")) {
		elem.remove();
	}
}
