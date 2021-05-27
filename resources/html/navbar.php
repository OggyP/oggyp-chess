<nav class="navbar">
    <a href="/">Home</a>
	<div class="w3-dropdown-hover dropdown">
		<button class="dropbtn">Openings</button>
		<div class="w3-dropdown-content w3-bar-block">
			<a href="/openings" class="w3-bar-item w3-button">Openings Home</a>
			<a href="/openings/search" class="w3-bar-item w3-button">Search Openings</a>
		</div>
	</div>
    <a href="/credits.php">Credits</a>
    <a href="/play">Play</a>
    <a href="/survey">Survey</a>
	<a href="/forum">Forums</a>
    <a class="material-icons" id="btnSettings" onclick="openNav()">settings</a>
	<form class="search_form" action="/search" method="GET">
        <input id="search_input" placeholder=" Search Pages..." type="text" name="query">
    </form>
</nav>
