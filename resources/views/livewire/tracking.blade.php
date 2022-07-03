<div>
    <div class="steps d-flex flex-wrap flex-sm-nowrap mt-3 ">
        <div class="step @if ($status >= 0) completed @endif">  
            <div class="step-icon-wrap">
                <div class="step-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
            <h4 class="step-title">Chờ xác nhận</h4>
        </div>
        <div class="step @if ($status >= 1) completed @endif">
            <div class="step-icon-wrap">
                <div class="step-icon"><i class="fas fa-check-double"></i></div>
            </div>
            <h4 class="step-title">Xác nhận đơn hàng</h4>
        </div>
        <div class="step @if ($status >= 2) completed @endif">
            <div class="step-icon-wrap">
                <div class="step-icon"><i class="fas fa-utensils"></i></div>
            </div>
            <h4 class="step-title">Chuẩn bị đơn hàng</h4>
        </div>
        <div class="step @if ($status >= 3) completed @endif">
            <div class="step-icon-wrap">
                <div class="step-icon"><i class="fas fa-motorcycle"></i></div>
            </div>
            <h4 class="step-title">Giao Hàng</h4>
        </div>
        <div class="step @if ($status >= 4) completed @endif">
            <div class="step-icon-wrap">
                <div class="step-icon"><i class="fas fa-clipboard-check"></i></div>
            </div>
            <h4 class="step-title">Hoàn tất</h4>
        </div>
    </div>
</div>
