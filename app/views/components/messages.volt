{% set errors = flashSession.getMessages('error') %}
{% if errors is not empty %}
    <div class="alert alert-danger">
        <ul>
        {% for message in errors %}
            <li>{{ message }}</li>
        {% endfor %}
        </ul>
    </div>
{% endif %}
{% set success = flashSession.getMessages('success') %}
{% if success is not empty %}
    <div class="alert alert-success">
        {% for message in success %}
            <p>{{ message }}</p>
        {% endfor %}
    </div>
{% endif %}