<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{asset}}css/style.css">
</head>

<body>
    <nav>
        <ul>
            {% if guest %}
            <li><a href="{{base}}/login">login</a></li>
            {% else %}
            <li><a href="{{base}}/recettes">Recettes</a></li>
            {% if session.privilege_id == 1 %}
            <li><a href="{{base}}/user/create">création d'utilisateur</a></li>
            {% endif %}
            <li><a href="{{base}}/logout">déconnexion</a></li>
            {% endif %}
        </ul>
    </nav>
    <main>
        {% if guest is empty %}
        <h1>Salut, {{ session.user_name }}</h1>
        {% endif %}