<?php
header("Content-type: text/css");
?>
{
    box-sizing: border-box;
}
.body-form {
    background: #AC92A6;
}
.style-a {
    text-decoration: none;
    background-color: #AC92A6;
    color: white;
    padding: 7px 10px;
    border-radius: 20px;
}
.heading{
    font-family: 'Roboto', sans-serif;
    font-size: 1.75rem;
    padding: 1rem;
    letter-spacing: 1.5px;
    text-align: center;
    text-transform: uppercase;
    color: #707981;
    margin-bottom: 50px;
}
.div_block{
    display: flex;
    width: 80%;
    margin: 20px auto;
    background: #afb4c2;
    text-align: center;
    border-radius: 20px;
}
.bottom_block{
    margin-top: 18%;
    margin-left: auto;
    margin-right: auto;
}
.item_block a {
    color: #fff;
}
.div_block h2 {
    margin-top: 10px auto;
    margin-bottom: 30px;
    font-size: 30px;
    letter-spacing: 2px;
}
.item_block{
    text-align: center;
    color: #fff;
    flex: 1 0 45%;
    outline: 1px solid  #fff;
    height: 300px;
}
.decor {
    position: relative;
    max-width: 800px;
    margin: 10px auto 0;
    background: white;
    border-radius: 30px;
    font-family: 'Roboto', sans-serif;
}
.text{
    font-family: 'Roboto', sans-serif;
    margin: 10px auto 0;
    max-width: 800px;
    line-height: 2;
    letter-spacing: 1px;
    text-align:justify;
}
.box {
    text-align: center;
}
.image-width{
    width: 75%;
    max-height: 450px;
}
.title {
    color: #AC92A6;
    font-size: 1.75em;
    padding: 1rem;
    text-align: center;
    border-radius: 8px;
}
.form-inner {
    padding: 50px;
}
.form-inner input, .form-inner textarea {
    display: block;
    width: 95%;
    padding: 0 20px;
    background: #E9EFF6;
    line-height: 40px;
    border-width: 0;
    border-radius: 20px;
    font-family: 'Roboto', sans-serif;
}
.form-inner input[type="submit"] {
    margin-top: 30px;
    background: #AC92A6;
    border-bottom: 4px solid #D5C7BC;
    color: white;
    font-size: 14px;
    cursor: pointer;
}
.form-inner textarea {
    resize: none;
}
.form-inner h3 {
    margin-top: 0;
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 24px;
    color: #707981;
}
.error h3{
    margin-top: 50px;
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 24px;
    color: #AC92A6;
    text-align: center;
}
.form-inner h4 {
    margin-top: 0;
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 30px;
    color: #707981;
    text-align: center;
}
#menu__toggle {
    font-family: 'Roboto', sans-serif;
    opacity: 0;
}
#menu__toggle:checked + .menu__btn > span {
    transform: rotate(45deg);
}
#menu__toggle:checked + .menu__btn > span::before {
    top: 0;
    transform: rotate(0deg);
}
#menu__toggle:checked + .menu__btn > span::after {
    top: 0;
    transform: rotate(90deg);
}
#menu__toggle:checked ~ .menu__box {
    left: 0 !important;
}
.menu__btn {
    position: fixed;
    top: 20px;
    left: 20px;
    width: 26px;
    height: 26px;
    cursor: pointer;
    z-index: 1;
}
.menu__btn > span,
.menu__btn > span::before,
.menu__btn > span::after {
    display: block;
    position: absolute;
    width: 100%;
    height: 2px;
    background-color: black;
    transition-duration: .40s;
}
.menu__btn > span::before {
    content: '';
    top: -8px;
}
.menu__btn > span::after {
    content: '';
    top: 8px;
}
.menu__box {
    display: block;
    position: fixed;
    top: 0;
    left: -100%;
    width: 300px;
    height: 100%;
    margin: 0;
    padding: 80px 0;
    list-style: none;
    background-color: #f3f3f3;
    box-shadow: 2px 2px 6px rgba(0, 0, 0, .4);
    transition-duration: .25s;
}
.menu__item {
    display: block;
    padding: 12px 24px;
    color: #333;
    font-family: 'Roboto', sans-serif;
    font-size: 20px;
    font-weight: 600;
    text-decoration: none;
    transition-duration: .25s;
}
.menu__item:hover {
    background-color: #AC92A6;
    color: #333;
}
.hamburger-menu {
    position: relative;
    display: block;
    z-index:2;
}
img {
    border: 2px solid #AC92A6;
    border-radius: 15px;
}
.add_answer {
    cursor: pointer;
    font-size: 30px;
    color: #AC92A6;
    padding-left: 20px;
}
#addQuestion {
    background: #AC92A6;
    height: 35px;
    width: 30%;
    border: none;
    border-radius: 20px;
    color: #eee;
    font-size: 18px;
    font-family: 'Roboto', sans-serif;
    position: relative;
    transition: 1s;
    -webkit-tap-highlight-color: transparent;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    padding-top: 3px;
    padding-bottom: 3px;
}
#addQuestion #circle {
    width: 15px;
    height: 5px;
    background: transparent;
    border-radius: 50%;
    position: absolute;
    top: 0;
    left: 50%;
    overflow: hidden;
    transition: 500ms;
}
.noselect {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
#addQuestion:hover {
    background: transparent;
}
#addQuestion:hover #circle {
    height: 35px;
    width: 50px;
    left: 0;
    border-radius: 0;
    border-bottom: 2px solid #eee;
}
.input-file-row {
    display: inline-block;
}
.input-file {
    position: relative;
    display: inline-block;
}
.input-file span {
    position: relative;
    display: inline-block;
    cursor: pointer;
    outline: none;
    text-decoration: none;
    font-size: 14px;
    vertical-align: middle;
    color: rgb(255 255 255);
    text-align: center;
    border-radius: 20px;
    background-color: #91AC97;
    line-height: 22px;
    height: 40px;
    padding: 10px 20px;
    box-sizing: border-box;
    border: none;
    margin: 0;
    transition: background-color 0.2s;
}
.input-file input[type=file] {
    position: absolute;
    z-index: -1;
    opacity: 0;
    display: block;
    width: 0;
    height: 0;
}
/* Focus */
.input-file input[type=file]:focus + span {
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}
/* Hover/active */
.input-file:hover span {
    background-color: #67896E;
}
.input-file:active span {
    background-color: #67896E;
}
/* Disabled */
.input-file input[type=file]:disabled + span {
    background-color: #eee;
}
/* Список c превью */
.input-file-list {
    padding: 10px 0;
}
.input-file-list-item {
    display: inline-block;
    margin: 0 15px 15px;
    width: 250px;
    vertical-align: top;
    position: relative;
}
.input-file-list-item img {
    width: 250px;
}
.input-file-list-name {
    text-align: center;
    display: block;
    font-size: 12px;
    text-overflow: ellipsis;
    <!--overflow: hidden;-->
}
.image-file{
    width: 250px;
    max-height: 250px;
}
.input-file-list-remove {
    color: #fff;
    text-decoration: none;
    display: inline-block;
    position: absolute;
    padding: 0px;
    margin: 0;
    top: 5px;
    right: 5px;
    background: #e32636;
    width: 16px;
    height: 16px;
    text-align: center;
    line-height: 16px;
    border-radius: 50%;
}
.input-group {
    position: relative;
}
.btn-danger{
    position: absolute;
    top: 0;
    width: 12%;
    border-radius: 20px;
    right: 0px;
    z-index: 2;
    border: none;
    top: 2px;
    height: 35px;
    cursor: pointer;
    color: white;
    background-color:#eb616c ;
    transform: translateX(2px);
}
.input-group-append{
    padding-top: 10px;
}
.delete-question{
    position: relative;
}
.button-trash{
    background-color: transparent;
    cursor: pointer;
    position: absolute;
    right: 75%;
    border: 0;
}
//стили для коментария в тесте
.main-content {
    padding-top: 100px;
    padding-bottom: 100px;
}
.flex-center {
    align-items: center;
}
.accordion-button{
    margin-bottom: 10px;
    border-color: #9fb5a8!important;
    background-color: #9fb5a8!important;
    border-radius: 20px !important;
    color: #fff!important;
}
.accordion-body {
    margin-top: 15px;
    padding: 25px;
    border-radius: 5px;
    box-shadow: 0 2px 25px -3px rgba(0, 0, 0, 0.1);
    margin-bottom: 10px;
}
.accordion-item{
    border: 0px!important;
}
.accordion-button:not(.collapsed){
    border-radius: 20px !important;
    border-color: #9fb5a8!important;
    color: #fff!important;
    box-shadow: inset 0 0px 0 rgb(0 0 0 / 13%);
}
.accordion-button::after {
    background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>") !important;
}
//стили кружков для вариантов ответов
.wrapper {
    min-height: 100vh;
}
.circle {
    position: relative;
    background: #8ca7a1;
    border-radius: 100%;
    height: 30px;
    width: 30px;
}
.small-circle{
    position: relative;
    background: #d3c6c7;
    border-radius: 100%;
    height: 30px;
    width: 30px;
}
.checkMark {
    position: absolute;
    transform: rotate(50deg) translate(-50%, -50%);
    left: 27%;
    top: 43%;
    height: 15px;
    width: 6px;
    border-bottom: 1px solid #fff;
    border-right: 2px solid #fff;
}
.formAnswer {
    padding: 10px;
    display: flex;
    flex-direction: row;
}
.answer-circle{
    padding-top: 5px;
    padding-left: 20px;
    <!--height: 30px;-->
}
//стили для страницы ошибки
#notfound {
    position: relative;
    height: 100vh;
}
#notfound .notfound {
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
.notfound {
    max-width: 767px;
    width: 100%;
    line-height: 1.4;
    text-align: center;
    padding: 15px;
}
.notfound .notfound-404 {
    position: relative;
    height: 220px;
}
.notfound .notfound-404 h1 {
    font-family: 'Roboto', sans-serif;
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    font-size: 186px;
    font-weight: 200;
    margin: 0px;
    background: linear-gradient(130deg, #916e89,  #AC92A6);
    color:transparent;
    -webkit-background-clip: text;
    background-clip: text;
    text-transform: uppercase;
}
.notfound h2 {
    font-family: 'Roboto', sans-serif;
    font-size: 33px;
    font-weight: 200;
    text-transform: uppercase;
    margin-top: 0px;
    margin-bottom: 25px;
    letter-spacing: 3px;
}
.notfound p {
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 200;
    margin-top: 0px;
    margin-bottom: 25px;
}
.notfound a {
    font-family: 'Roboto', sans-serif;
    color:  #AC92A6;
    font-weight: 200;
    text-decoration: none;
    border-bottom: 1px dashed  #AC92A6;
    border-radius: 2px;
}
@media only screen and (max-width: 480px) {
    .notfound .notfound-404 {
        position: relative;
        height: 168px;
    }
    .notfound .notfound-404 h1 {
        font-size: 142px;
    }
    .notfound h2 {
        font-size: 22px;
    }
}



