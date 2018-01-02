//Make this a session variable
var activeMenuItem = 0;

//This function is called when a tab is click in the menu.
//It is suppose to toggle which tab is highlighted.
function ToggleHighlightedTab(itemNumber)
{
	activeMenuItem = itemNumber;
}

function SwitchActiveClass()
{
	var newActive = document.getElementById('menu-items').children[activeMenuItem];
	newActive.classList.add("active");
}