pico_get_by_filename
====================

A Pico CMS plugin to grab content by the filename. You can call pages by their filename instead of looping through each and then using an if.

This allows you to make sections of your site like widgets. Where if you had a sidebar you can just make a `sidebar.md` file and then load in the sidebar section of your theme.

#### Usage

```html
<div class="content">
  <!-- my normal page content -->
  {{ content }}
</div>
<div class="sidebar">
  <!-- You can load all the properties you would normally be able to load from the page array -->
  <h3>{{ pages['sidebar'].title }}</h3>
  <p>{{ pages['sidebar'].content }}</p>
</div>
```

#### Issues

You might have a situation where you don't want the page to show up in your menu. The nice thing is that you know the filename so you can check the conditions so that file doesn't show.

```html
<ul class="nav">
  {% for page in pages %}
    {% if page.filename != 'sidebar' %}
      <li><a href="{{ page.url }}">{{ page.title }}</a></li>
    {% endif %}
  {% endfor %}
</ul>
```