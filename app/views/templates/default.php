<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Website | {% block title %}{% endblock %}</title>
  </head>
  <body>
    {% includes templates/partials/navigation.php %}
    {% includes templates/partials/messages.php %}
    {% block content %}{% endblock %}
  </body>
</html>
