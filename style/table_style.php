<?php
header("Content-type: text/css");
?>
body {
    background-color: white;
    font-family: 'Roboto', sans-serif;
}
.header {
    background-color: #AC92A6;
    color: white;
    font-size: 1.5em;
    padding: 1rem;
    text-align: center;
    text-transform: uppercase;
    border-radius: 8px;
}
.table {
    padding-top: 20px;
    width: 100%;
    border: none;
    margin-bottom: 20px;
}
.table thead th {
    font-weight: bold;
    text-align: left;
    border: none;
    padding: 10px 15px;
    background: #ccbbc8;
    font-size: 14px;
}
.table thead tr th:first-child {
    border-radius: 8px 0 0 8px;
}
.table thead tr th:last-child {
    border-radius: 0 8px 8px 0;
}
.text {
    display: block;
    overflow: scroll;
    white-space: nowrap;
}
.text_question{
    display: block;
    overflow: scroll;
    white-space: nowrap;
    max-height: 150px;
}
span.image {
    display: inline-block;
    white-space: nowrap;
    width: 150px;
}
.table tbody td {
    text-align: left;
    border: none;
    padding: 10px 15px;
    font-size: 14px;
    vertical-align: top;
    overflow: hidden;
    word-wrap:break-word;

}
.table tbody tr:nth-child(even){
    background: #f3f3f3;
}
.table tbody tr td:first-child {
    border-radius: 8px 0 0 8px;
}
.table tbody tr td:last-child {
    border-radius: 0 8px 8px 0;
}