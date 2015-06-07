{{ link_to('signup', 'Sign up here!') }}

<p>{{ namefield }}</p>

<ul>
  {% for fruit in fruits %}
  <li>{{ fruit }}</li>
  {% endfor %}
</ul>
