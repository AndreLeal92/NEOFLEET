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
        }

        .sidebar .logo{
            font-size:22px;
            font-weight:bold;
        }

        .sidebar nav{
            display:flex;
            flex-direction:column;
            gap:8px;
            margin-top:20px;
        }

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

        .sidebar .logout{
            color:#ef4444;
        }

        /* CONTEÚDO */
        .content{
            margin-left:250px;
            padding:25px;
            min-height:100vh;
        }

        /* HR */
        hr{
            border:none;
            border-top:1px solid #e2e8f0;
            margin:20px 0;
        }

    </style>

</head>
<body>