/*General*/
.query_result {
    width: 90%;
    color: <?php echo modechange($mode,'black','white', 'white'); ?>;
    font-size: x-large;
    margin-left: 5%;
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
}
.query_result_content {
    color: <?php echo modechange($mode, '#2eb02e', '#86C232', '#86C232'); ?>;
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
}
.submit {
    font-size: 3em;
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
    border: aquamarine solid 10px;
    background-color: mediumaquamarine;
    width: 80%;
    height: 5%;
    
    margin: 3% 0 5% 10%;
    padding: 1em 0;
}


/*Survey CSS*/
.survey_title {
    background: none !important;
}


/*Search CSS*/
.search {
    margin: 30px auto 0 auto;
    width: 90%;
}

#query_input {
    width: 75%;
    border-radius: 3px;
    padding: 5px;
    <?php echo modechange($mode,'','background: #4d4d4d;','background: #4d4d4d;'); ?>
    <?php echo modechange($mode,'','color: white;','color: white;'); ?>
    border: 1px solid <?php echo modechange($mode,'#000000','#f1f1f1','#f1f1f1'); ?>;
}

#query_submit {
    width: 19%;
}


/*Survey CSS*/
.survey_title {
    background-color: <?php echo modechange($mode,'#d9d9d9','#333333','#333333'); ?>;
}

.survey_items {
    text-align: center;
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
    font-size: large;
    width: 85%;
    margin: 2% auto 0 auto;
    color: <?php echo modechange($mode,'black','white', 'white'); ?>;
    background-color: <?php echo modechange($mode,'#c4c4c7','#111111','#111111'); ?>;
    position: relative;
    padding: 2% 0;
}

.input_select {
    width: 50%;
    text-align: center;
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
    color: white;
    font-size: x-large;
    margin: 2% auto;
    <?php echo modechange($mode,'color: #2C2F33;','',''); ?>;
}

.error {
    color: red;
    font-size: xx-large;
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
}

.survey_out {
    margin: 3% auto;
    text-align: center;
    width: 50%;
    color: <?php echo modechange($mode,'#2C2F33','white','white'); ?>;
    font-size: xx-large;
    font-family: <?php echo modechange($mode,"'Spartan', sans-serif","'Spartan', sans-serif" ,"'Comic Sans MS'"); ?>;
}
