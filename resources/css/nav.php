/*General*/
.navbar {
    height: 125px;
    width: 100%;
    background: <?php echo modechange($mode,'rgb(160, 160, 160)','rgb(71,75,79)','rgb(71,75,79)'); ?>;
    background: <?php echo modechange($mode,'linear-gradient(180deg, rgb(180, 180, 190, 1) 0%, rgb(255, 255, 255,0) 85%)','linear-gradient(180deg, rgba(100,100,100,1) 0%, rgba(51,51,51,0) 65%)','linear-gradient(180deg, rgba(100,100,100,1) 0%, rgba(51,51,51,0) 65%)'); ?>;
    top: 0;
}

/*Links*/
.navbar a  {
    float: left;
    font-size: 25px;
    color: <?php echo modechange($mode,'black','white','white'); ?>;
    text-align: center;
    margin: 0px;
    padding: 25px;
    text-decoration: none;
    text-shadow: 0 0 0 <?php echo modechange($mode,'black','white','white'); ?>;
    height: auto;
	-webkit-user-select: none; /* Safari */
    -ms-user-select: none; /* IE 10 and IE 11 */
    user-select: none; /* Standard syntax */
}

.navbar a:hover {
    background-color: <?php echo modechange($mode,'rgb(220, 220, 230)','rgba(71,75,79,1)','rgba(71,75,79,1)'); ?>;
	transition: 0.3s;
}

#btnSettings {
	float: right;
}

#btnSettings:hover {
	background-color: transparent;
}


/*Submenus*/
.dropdown {
    float: left;
	border: none;
    -webkit-user-select: none; /* Safari */
    -ms-user-select: none; /* IE 10 and IE 11 */
    user-select: none; /* Standard syntax */
}

.dropbtn {
    cursor: pointer;
    font-size: 25px;
    color: <?php echo modechange($mode,'black','white', 'white'); ?>;
    padding: 25px;
    background-color: inherit; /* take from its parent */
    font-family: 'Spartan', sans-serif;
    margin: 0;
	border: none;
}

.dropdown a {
    background-color: <?php echo modechange($mode,'#f0f0f0','#333','#333'); ?>;
    box-sizing: border-box;
    width: 100%;
}

.dropbtn:hover,
.dropbtn:focus {
    background-color: <?php echo modechange($mode,'rgb(220, 220, 230)','rgba(71,75,79,1)','rgba(71,75,79,1)'); ?>;
}


/*Search*/
.search_form {
    width: 20%;
    float: right;
    font-size: 25px;
    <?php echo modechange($mode, 'color: #000000;','', ''); ?>
    text-align: center;
    padding: 20px;
    height: 2em;
}

#search_input {
    <?php echo modechange($mode, '', 'background-color: #525252;', 'background-color: #525252;'); ?>
    <?php echo modechange($mode, '', 'color: #ffffff;', 'color: #ffffff;'); ?>
    font-family: 'Spartan', sans-serif;
	width: 100%;
    border-radius: 3px;
    border: 1px solid gray;
}
