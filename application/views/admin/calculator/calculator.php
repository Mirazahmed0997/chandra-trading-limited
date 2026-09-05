<!-- <div class="content-wrapper">
    <a href="javascript:void(0);" class="btn btn-warning btn-sm open-charge-modal">Calculator</a>
</div> -->

<div class="modal fade" id="chargeModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content shadow">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Calculator</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <input type="text" id="display" class="form-control form-control-lg text-end mb-3">

                <div>
                    <div class="btn-container">
                        <div class="calculator-grid">
                            <button class="btn btn-light calc-btn">7</button>
                            <button class="btn btn-light calc-btn">8</button>
                            <button class="btn btn-light calc-btn">9</button>

                            <button class="btn btn-light calc-btn">4</button>
                            <button class="btn btn-light calc-btn">5</button>
                            <button class="btn btn-light calc-btn">6</button>

                            <button class="btn btn-light calc-btn">1</button>
                            <button class="btn btn-light calc-btn">2</button>
                            <button class="btn btn-light calc-btn">3</button>

                            <button class="btn btn-light calc-btn">0</button>
                            <button id="clearBtn" class="btn btn-danger">C</button>
                            <button id="equalBtn" class="btn btn-success">=</button>
                        </div>

                        <div class="operation-grid">
                            <button id="correct_btn" class="btn btn-warning ">Correct</button>
                            <button class="btn btn-warning calc-btn">+</button>
                            <button class="btn btn-warning calc-btn">-</button>
                            <button class="btn btn-warning calc-btn">*</button>
                            <button class="btn btn-warning calc-btn">/</button>
                            <button id="percentBtn" class="btn btn-warning ">%</button>
                            <button id="sqrtBtn" class="btn btn-warning calc-btn">√</button>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>




<style>
    .calculator-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .operation-grid {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-left: 10px;
    }

    .btn-container {
        display: flex;
    }

    .calculator-grid button {
        height: 55px;
        font-size: 20px;
        font-weight: 600;
        border-radius: 10px;
    }

    #display {
        font-size: 24px;
        font-weight: bold;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>

    const display = document.getElementById('display');
    $(document).on("click", ".open-charge-modal", function () {
        $("#chargeModal").modal("show");
    });

    $('#chargeModal').on('shown.bs.modal', function () {
        display.focus();
    });

    document.querySelectorAll('.calc-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            display.value += btn.innerText;
        });
    });



    document.getElementById('sqrtBtn')
        .addEventListener('click', function () {

            const value = parseFloat(display.value);

            if (isNaN(value) || value < 0) {
                display.value = 'Error';
                return;
            }

            display.value = Math.sqrt(value);
        });





    document.getElementById('percentBtn')
        .addEventListener('click', function () {
            const values = display.value;
            console.log(values)
            let plus = values.includes("+");
            let minus = values.includes("-");
            let multiply = values.includes("*");

            if (multiply) {
                let numbs = values.split('*')
                const num1 = parseFloat(numbs[0])
                const num2 = parseFloat(numbs[1])

                console.log(num1, num2)
                calculate = num1 * num2 / 100;
                display.value = calculate
            }
            else if (minus) {
                let numbs = values.split('-')
                const num1 = parseFloat(numbs[0])
                const num2 = parseFloat(numbs[1])

                console.log(num1, num2)
                calculate = num1 - (num1 * num2 / 100);
                display.value = calculate
            }
            else if (plus) {
                let numbs = values.split('+')
                const num1 = parseFloat(numbs[0])
                const num2 = parseFloat(numbs[1])

                console.log(num1, num2)
                calculate = num1 + (num1 * num2 / 100);
                display.value = calculate
            }
        });



    function runCalculation() {
        try {

            const expression = display.value;

            if (!/^[0-9+\-*/(). ]+$/.test(expression)) {
                display.value = 'Error';
                return;
            }

            const result = Function(
                '"use strict"; return (' + expression + ')'
            )();

            display.value = result;

        } catch (e) {
            display.value = 'Error';
        }
    }


    document.getElementById('equalBtn')
        .addEventListener('click', runCalculation);

    document.getElementById('clearBtn')
        .addEventListener('click', () => {
            display.value = '';
        });

    document.getElementById('correct_btn')
        .addEventListener('click', () => {
            display.value = display.value.slice(0, -1);
        });

    document.addEventListener('keydown', function (e) {

        if (!$('#chargeModal').hasClass('show')) {
            return;
        }

        if (e.target === display) {
            return;
        }
        if (/^[0-9+\-*/%.]$/.test(e.key)) {
            display.value += e.key;
        }

        if (e.key === 'Enter') {
            e.preventDefault();
            runCalculation();
        }

        if (e.key === 'Backspace') {
            e.preventDefault();
            display.value = display.value.slice(0, -1);
        }

        if (e.key === 'Escape') {
            display.value = '';
        }
    });


    // document.querySelectorAll('.calc-btn').forEach(btn => {
    //     btn.addEventListener('click', function () {
    //         display.value += this.innerText;
    //         values = display.value

    // let plus = values.includes("+");
    // let minus = values.includes("-");
    // let multiply = values.includes("x");
    //         let division = values.includes("/");
    //         let input;
    //         let calculate;

    // if (plus) {
    //     input = values.split("+");
    //     calculate = parseFloat(input[0]) + parseFloat(input[1])

    // }
    //         else if (minus) {
    //             input = values.split("-");
    //             calculate = parseFloat(input[0]) - parseFloat(input[1])
    //         }
    //         else if (multiply) {
    //             input = values.split("x");
    //             calculate = parseFloat(input[0]) * parseFloat(input[1])
    //         }
    //         else if (division) {
    //             input = values.split("/");
    //             calculate = parseFloat(input[0]) / parseFloat(input[1])
    //         }

    //         equal = document.getElementById('=')

    //         equal.addEventListener('keydown',function(){
    //             conv_cal = calculate.toString();
    //             display.value=conv_cal
    //             console.log(conv_cal)
    //         })
    //     });
    // });


</script>