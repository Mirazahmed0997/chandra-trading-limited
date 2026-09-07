<?php if ($this->session->flashdata('users_reg_error')): ?>
    <div class="alert-banner alert-danger-custom">
        <?php echo $this->session->flashdata('users_reg_error'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert-banner alert-success-custom">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<style>
    :root {
        --primary: #2563eb;
        --primary-hover: #1d4ed8;
        --success: #10b981;
        --success-hover: #059669;
        --danger: #ef4444;
        --bg-color: #f8fafc;
        --card-bg: #ffffff;
        --text-main: #1e293b;
        --text-muted: #64748b;
        --border-color: #e2e8f0;
        --focus-ring: rgba(37, 99, 235, 0.15);
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        background-color: var(--bg-color);
        color: var(--text-main);
        margin: 0;
        padding: 40px 15px;
    }

    .form-container {
        max-width: 680px;
        margin: 0 auto;
        background: var(--card-bg);
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.05), 0 8px 10px -6px rgba(15, 23, 42, 0.05);
        border: 1px solid var(--border-color);
    }

    .form-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .form-title {
        font-size: 24px;
        font-weight: 700;
        color: var(--text-main);
        letter-spacing: -0.02em;
        margin: 0 0 8px 0;
    }

    .form-subtitle {
        font-size: 14px;
        color: var(--text-muted);
        margin: 0;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full-width {
        grid-column: span 2;
    }

    .form-group label {
        font-size: 13px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 6px;
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .form-control {
        width: 100%;
        padding: 10px 14px;
        font-size: 14px;
        line-height: 1.5;
        color: var(--text-main);
        background-color: #fff;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        transition: all 0.2s ease-in-out;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px var(--focus-ring);
        outline: none;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;
        padding-right: 40px;
    }

    .password-toggle {
        position: absolute;
        right: 12px;
        color: var(--text-muted);
        cursor: pointer;
        padding: 4px;
        transition: color 0.2s ease;
    }

    .password-toggle:hover {
        color: var(--text-main);
    }

    .alert-banner {
        max-width: 680px;
        margin: 0 auto 20px;
        padding: 14px 18px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-danger-custom {
        background-color: #fef2f2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    .alert-success-custom {
        background-color: #ecfdf5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }

    .button-group {
        display: flex;
        gap: 12px;
        margin-top: 28px;
        grid-column: span 2;
    }

    .btn-custom {
        flex: 1;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-submit {
        background-color: var(--primary);
        color: #ffffff;
    }

    .btn-submit:hover {
        background-color: var(--primary-hover);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    }

    .btn-reset-custom {
        background-color: #f1f5f9;
        color: #475569;
        border: 1px solid var(--border-color);
    }

    .btn-reset-custom:hover {
        background-color: #e2e8f0;
        color: #1e293b;
    }

    @media (max-width: 640px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full-width {
            grid-column: span 1;
        }

        .button-group {
            grid-column: span 1;
            flex-direction: column;
        }

        .form-container {
            padding: 24px;
        }
    }
</style>




<?php if ($this->session->flashdata('reg_error')): ?>
    <div class="alert-banner alert-danger-custom auto-hide-alert">
        <i class="fa fa-exclamation-circle"></i>
        <span><?php echo $this->session->flashdata('reg_error'); ?></span>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert-banner alert-success-custom auto-hide-alert">
        <i class="fa fa-check-circle"></i>
        <span><?php echo $this->session->flashdata('success'); ?></span>
    </div>
<?php endif; ?>




<div class="form-container ">
    <div class="form-header">
        <h2 class="form-title">Create New Account</h2>
        <p class="form-subtitle">Fill in the details below to register a new user</p>
    </div>

    <form action="<?php echo base_url('admin_registration'); ?>" method="post" onsubmit="return validatePassword();">
        <div class="form-grid">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="John" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Doe" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="johndoe" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com"
                    required>
            </div>

            <div class="form-group">
                <label for="mobile_number">Mobile Number</label>
                <input type="tel" id="mobile_number" name="mobile_number" class="form-control"
                    placeholder="+880 1700-000000" required>
            </div>

            <div class="form-group">
                <label for="designation">Designation</label>
                <select id="designation" name="designation" class="form-control" required>
                    <option value="" disabled selected>Select Designation</option>
                    <option value="Chairman">Chairman</option>
                    <option value="Manager">Manager</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="Operator">Operator</option>
                    <option value="Admin">Admin</option>
                    <option value="Super Admin">Super Admin</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Minimum 8 characters" required>
                    <i class="fa fa-eye password-toggle" onclick="togglePassword('password', this)"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <div class="input-wrapper">
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                        placeholder="Re-enter password" required>
                    <i class="fa fa-eye password-toggle" onclick="togglePassword('confirm_password', this)"></i>
                </div>
            </div>

            <div class="button-group">
                <button type="submit" class="btn-custom btn-submit">
                    <i class="fa fa-user-plus"></i> Register User
                </button>
                <button type="reset" class="btn-custom btn-reset-custom">
                    <i class="fa fa-undo"></i> Reset Form
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (password.length < 8) {
            alert("পাসওয়ার্ড কমপক্ষে ৮ ডিজিট হতে হবে");
            return false;
        }
        if (password !== confirmPassword) {
            alert("পাসওয়ার্ড মিলছে না!");
            return false;
        }

        return true;
    }

    function togglePassword(fieldId, icon) {
        var input = document.getElementById(fieldId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

<script>
    setTimeout(function () {
        const alerts = document.querySelectorAll('.auto-hide-alert');

        alerts.forEach(function (alert) {
            alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';

            setTimeout(function () {
                alert.remove();
            }, 500);
        });
    }, 5000); // 5 seconds
</script>