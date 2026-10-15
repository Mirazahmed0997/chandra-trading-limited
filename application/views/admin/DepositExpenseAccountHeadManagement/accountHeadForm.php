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

<style>
    :root {
        --primary: #2563eb;
        --primary-hover: #1d4ed8;
        --success: #10b981;
        --danger: #ef4444;
        --bg-color: #f8fafc;
        --card-bg: #ffffff;
        --text-main: #0f172a;
        --text-muted: #64748b;
        --border-color: #e2e8f0;
        --input-bg: #f8fafc;
        --focus-ring: rgba(37, 99, 235, 0.15);
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        background-color: var(--bg-color);
        color: var(--text-main);
        margin: 0;
        padding: 40px 16px;
    }

    .alert-banner {
        max-width: 680px;
        margin: 0 auto 20px;
        padding: 14px 18px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
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

    .form-card {
        max-width: 680px;
        margin: 0 auto;
        background: var(--card-bg);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.04), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
        border: 1px solid var(--border-color);
    }

    .form-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .form-title {
        font-size: 26px;
        font-weight: 700;
        color: var(--text-main);
        letter-spacing: -0.025em;
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
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .form-control {
        width: 100%;
        padding: 11px 14px;
        font-size: 14px;
        line-height: 1.5;
        color: var(--text-main);
        background-color: var(--input-bg);
        border: 1px solid var(--border-color);
        border-radius: 10px;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        box-sizing: border-box;
    }

    .form-control:focus {
        background-color: #ffffff;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px var(--focus-ring);
        outline: none;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 14px center;
        background-size: 16px;
        padding-right: 42px;
        cursor: pointer;
    }

    .button-group {
        display: flex;
        gap: 12px;
        margin-top: 12px;
        grid-column: span 2;
    }

    .btn-custom {
        flex: 1;
        padding: 12px 20px;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-submit {
        background-color: var(--primary);
        color: #ffffff;
        box-shadow: 0 2px 4px rgba(37, 99, 235, 0.1);
    }

    .btn-submit:hover {
        background-color: var(--primary-hover);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .btn-reset-custom {
        background-color: #f1f5f9;
        color: #475569;
        border: 1px solid var(--border-color);
    }

    .btn-reset-custom:hover {
        background-color: #e2e8f0;
        color: #0f172a;
    }

    @media (max-width: 640px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full-width,
        .button-group {
            grid-column: span 1;
        }

        .button-group {
            flex-direction: column;
        }

        .form-card {
            padding: 24px;
        }
    }
</style>

<div class="form-card mt-5">
    <div class="form-header">
        <h2 class="form-title">Create Account Head</h2>
        <p class="form-subtitle">Fill in the details below to add a new account head</p>
    </div>

    <form action="<?php echo base_url('Deposit_Expense_Account_HeadManagement_Save'); ?>" method="post">
        <div class="form-grid">
            <div class="form-group">
                <label for="account_head_name">Account Head Name</label>
                <input type="text" id="account_head_name" name="account_head_name" class="form-control"
                    placeholder="e.g. Utility Bills" required>
            </div>

            <div class="form-group">
                <label for="account_type">Account Type</label>
                <select id="account_type" name="account_type" class="form-control" required>
                    <option value="" disabled selected>Select type</option>
                    <option value="Deposit">Deposit</option>
                    <option value="Expense">Expense</option>
                </select>
            </div>

            <div class="form-group">
                <label for="account_code">Account Code</label>
                <input type="text" id="account_code" name="account_code" class="form-control"
                    placeholder="e.g. ACC-1092" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category" class="form-control" required>
                    <option value="" disabled selected>Select category</option>
                    <optgroup label="Expenses">
                        <option value="Operating Expenses">Operating Expenses</option>
                        <option value="Personnel & Payroll">Personnel & Payroll</option>
                        <option value="Marketing & Sales">Marketing & Sales</option>
                        <option value="Administrative Fees">Administrative Fees</option>
                    </optgroup>
                    <optgroup label="Deposits / Income">
                        <option value="Operating Revenue">Operating Revenue</option>
                        <option value="Non-Operating Income">Non-Operating Income</option>
                        <option value="Capital & Financing">Capital & Financing</option>
                    </optgroup>
                </select>
            </div>

            <div class="button-group">
                <button type="submit" class="btn-custom btn-submit">
                    <i class="fa fa-plus-circle"></i> Save Account Head
                </button>
                <button type="reset" class="btn-custom btn-reset-custom">
                    <i class="fa fa-undo"></i> Reset
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            const alerts = document.querySelectorAll('.auto-hide-alert');
            alerts.forEach(function (alert) {
                alert.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-8px)';

                setTimeout(function () {
                    alert.remove();
                }, 400);
            });
        }, 5000);
    });
</script>