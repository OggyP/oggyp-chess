@import url('https://fonts.googleapis.com/css2?family=Spartan:wght@100&display=swap');

body {
    margin: 0;
    position: relative;
    background-color: <?php echo modechange($mode,'#f0f0f0','#222629', 'pink');?>;
    min-height: 100vh;
}
.page {
    /*position: absolute;*/
    margin: 0 20%;
}

.content {
    background-color: <?php echo modechange($mode,'#f0f0f0','#333', '#333'); ?>;
    width: 80%;
    padding: 10px;
    margin: 5% auto 4% auto;
    -webkit-box-shadow: inset 0px 0px 15px 5px <?php modechange($mode,'#c9c9c9','black', 'black'); ?>;
    box-shadow: inset 0px 0px 15px 5px <?php modechange($mode,'#c9c9c9','black', 'black'); ?>;
}

h1 {
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
    font-size: 110px;
    text-align: center;
    text-shadow: 0 0 0 <?php echo modechange($mode,'#e0e0e0','#474b4f' ,'#474b4f'); ?>;
    margin: 50px auto;
    color: <?php echo modechange($mode,'#3a3a3a','white', 'white'); ?>;
    min-width: fit-content;
}

h2 {
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
    font-size: 30px;
    text-align: center;
    margin: 30px auto;
    color: <?php echo modechange($mode, '#5b5e5f', '#6B6E70', '#6B6E70'); ?>;
    line-height: 1.5em;
}

h3 {
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
    font-size: 25px;
    text-align: center;
    
    margin: 10px 20%;
    color: <?php echo modechange($mode, '#2eb02e', '#86C232', '#86C232'); ?>;
}

h4 {
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
    font-size: 35px;
    text-align: left;
    margin: 25px 25px;
    color: lightgray;
}

a  {
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
    font-size: 25px;
    text-align: center;
    text-shadow: 3px 3px 3px <?php echo modechange($mode, '#308a36', '#61892F', '#61892F'); ?>;
    margin: 30px 0 0;
    color: <?php echo modechange($mode, '#2eb02e', '#86C232', '#86C232'); ?>;
}

a:hover {
    color: <?php echo modechange($mode, '#3399ff', 'lightblue', 'lightblue'); ?>;
    text-shadow: 3px 3px 3px #74C36E;
}

b {
    <?php echo modechange($mode, 'color:#2eb02e;', '', ''); ?>
}

hr {
    color: lightgray;
}

ul {
    list-style-type: none;
}

.text_input {
    width: 79%;
    height: 20%;
    margin: 0 auto 3% 10%;
    <?php echo modechange($mode, '', 'background-color: #525252;', 'background-color: #525252;'); ?>
    <?php echo modechange($mode, '', 'color: #ffffff;', 'color: #ffffff;'); ?>
    border-radius: 3px;
    border: 1px solid gray;
}

.icon {
    text-align: center;
    color:#979797;
    font-size: 50px;
}

.wrapper1 {
    text-align: center;
}

.garbagebutton {
    background-color: <?php echo modechange($mode, '#2eb02e', '#86C232', '#86C232'); ?>; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 25px;
    margin: 4px 2px;
    cursor: pointer;
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    border-radius: 4px;
}
.material-icons {
	color: #fff;
	font-size: 50px;
	float: right;
}
#btnSettings {
	cursor: pointer;
}
