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
    z-index:1000;
}

/* COLAPSADA */
.sidebar.closed{
    width:70px;
}

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

/* BOTÃO */
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

/* OVERLAY */
.overlay{
    display:none;
}

/* MOBILE */
@media (max-width:768px){

    .sidebar{
        transform:translateX(-100%);
    }

    .sidebar.open{
        transform:translateX(0);
    }

    .content{
        margin-left:0;
    }

    .toggle-btn{
        position:fixed;
        top:15px;
        left:15px;
        right:auto;
        z-index:1100;
    }

    .overlay{
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:rgba(0,0,0,0.5);
        display:none;
        z-index:900;
    }

    .overlay.active{
        display:block;
    }

}

/* LOGOUT (SAIR) */
.sidebar .logout{
    color:#ef4444;
}

.sidebar .logout:hover{
    background:#7f1d1d;
    color:#fff;
}

</style>

</head>
<body>