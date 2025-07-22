<style>
    .alert-success-custom,
    .alert-danger-custom {
        position: absolute !important;
        right: 20px;
        z-index: 1000;
        transition: opacity 0.5s ease;
    }
    .alert ul {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }
</style>
{% set errors = flashSession.getMessages('error') %}
{% if errors is not empty %}
    <div class="alert alert-danger alert-danger-custom">
        <ul>
        {% for message in errors %}
            <li>{{ message }}</li>
        {% endfor %}
        </ul>
    </div>
{% endif %}
{% set success = flashSession.getMessages('success') %}
{% if success is not empty %}
    <div class="alert alert-success alert-success-custom">
        {% for message in success %}
            <p>{{ message }}</p>
        {% endfor %}
    </div>
{% endif %}