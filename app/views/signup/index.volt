<h2>signup page</h2>

{{ form('signup/register') }}

<p>
  <label for="name">Name</label>
  {{ text_field('name', 'size': 16) }}
</p>

<p>
  <label for="email">E-Mail</label>
  {{ text_field('email', 'size': 32) }}
</p>

<p>{{ submit_button('register') }}</p>
{{ end_form() }}

