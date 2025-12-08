<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') - {{ config('app.name') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
  @include('layouts.navbar')

  @yield('content')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

      const modeSwitch = document.getElementById('modeSwitchToggle');
      const modeSwitchIcon = document.getElementById('modeSwitchToggleIcon');
      const htmlElement = document.documentElement;

      const currentTheme = localStorage.getItem('theme');

      if (currentTheme === 'dark') {
        htmlElement.setAttribute('data-bs-theme', 'dark');
        modeSwitch.checked = true;
        // Set icon for dark mode
        modeSwitchIcon.className = 'bi bi-sun';
      } else {
        htmlElement.setAttribute('data-bs-theme', 'light');
      }

      modeSwitch.addEventListener('change', function () {
        if (this.checked) {
          htmlElement.setAttribute('data-bs-theme', 'dark');
          modeSwitchIcon.className = 'bi bi-sun'; // Replace entire class
          localStorage.setItem('theme', 'dark');
        } else {
          htmlElement.setAttribute('data-bs-theme', 'light');
          modeSwitchIcon.className = 'bi bi-moon-stars-fill'; // Replace entire class
          localStorage.setItem('theme', 'light');
        }
      });
    });
  </script>

  @stack('modal')
</body>

</html>
