<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>NeoFleet</title>

<style>

/* RESET */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI', Arial, sans-serif;
    background:#f1f5f9;
}

/* SIDEBAR */
.sidebar{
    width:250px;
    height:100vh;
    background:#1e293b;
    color:#fff;
    position:fixed;
    top:0;
    left:0;
    padding:20px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    transition:0.3s;
}

/* FECHADA */
.sidebar.closed{
    width:70px;
}

/* ESCONDE TEXTO */
.sidebar.closed .text{
    display:none;
}

/* LINKS */
.sidebar a{
    display:block;
    color:#cbd5e1;
    text-decoration:none;
    padding:10px 12px;
    border-radius:8px;
    transition:0.2s;
    font-size:14px;
}

.sidebar a:hover{
    background:#334155;
    color:#fff;
}

.sidebar a.active{
    background:#3b82f6;
    color:#fff;
}

/* LOGO */
.logo{
    font-size:20px;
    font-weight:bold;
}

/* BOTÃO TOGGLE */
.toggle-btn{
    position:absolute;
    top:20px;
    right:-15px;
    background:#3b82f6;
    color:#fff;
    width:30px;
    height:30px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
}

/* DROPDOWN */
.dropdown-menu{
    display:none;
    flex-direction:column;
    padding-left:15px;
}

.dropdown.open .dropdown-menu{
    display:flex;
}

.arrow{
    float:right;
    transition:0.2s;
}

.dropdown.open .arrow{
    transform:rotate(90deg);
}

/* CONTENT */
.content{
    margin-left:250px;
    padding:25px;
    transition:0.3s;
}

.sidebar.closed ~ .content{
    margin-left:70px;
}

/* HR */
hr{
    border:none;
    border-top:1px solid #334155;
    margin:15px 0;
}

</style>

</head>
<body>