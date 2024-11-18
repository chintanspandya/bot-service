@if (session('success', session('status')))
  <div class="custom-alert success-alert">
    <div class="alert-icon">
      <i class="fas fa-check-circle"></i>
    </div>
    <div class="alert-content">
      <strong>Success:</strong> {{ session('success', session('status')) }}
    </div>
    <button type="button" class="close-alert" onclick="closeAlert(this)">
      &times;
    </button>
  </div>
@endif

@if (session('error'))
  <div class="custom-alert error-alert">
    <div class="alert-icon">
      <i class="fas fa-exclamation-triangle"></i>
    </div>
    <div class="alert-content">
      <strong>Error:</strong> {{ session('error') }}
    </div>
    <button type="button" class="close-alert" onclick="closeAlert(this)">
      &times;
    </button>
  </div>
@endif

@if ($errors->any())
  <div class="custom-alert error-alert">
    <div class="alert-icon">
      <i class="fas fa-exclamation-triangle"></i>
    </div>
    <div class="alert-content">
      <div class="error-messages">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    </div>
    <button type="button" class="close-alert" onclick="closeAlert(this)">
      &times;
    </button>
  </div>
@endif


<!-- Custom Styles -->
<style>
  .custom-alert {
    display: flex;
    align-items: flex-start;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
    position: relative;
    animation: fade-in 0.5s ease-in-out;
  }

  .success-alert {
    background-color: #e6f9f0;
    border-left: 5px solid #28a745;
    color: #155724;
  }

  .error-alert {
    background-color: #ffe6e6;
    border-left: 5px solid #dc3545;
    color: #721c24;
  }

  .alert-icon {
    margin-right: 10px;
  }

  .alert-icon i {
    font-size: 1.5em;
  }

  .alert-content {
    flex-grow: 1;
  }

  .error-messages p {
    margin: 0;
    margin-bottom: 5px;
  }

  .close-alert {
    width: 60px;
    background: none;
    border: none;
    font-size: 1.5rem;
    color: inherit;
    position: absolute;
    right: 15px;
    top: 0px;
    margin: 0;
    cursor: pointer;
  }

  @keyframes fade-in {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>

<!-- Custom Script -->
<script>
  function closeAlert(button) {
    var alertBox = button.closest('.custom-alert');
    alertBox.style.opacity = '0';
    setTimeout(function() {
      alertBox.style.display = 'none';
    }, 300);  // Adjust timing to match fade-out
  }

  // Automatically close alerts after 5 seconds
  setTimeout(function() {
    document.querySelectorAll('.custom-alert').forEach(function(alert) {
      alert.style.opacity = '0';
      setTimeout(function() {
        alert.style.display = 'none';
      }, 300);
    });
  }, 5000);
</script>
