@if($welcomePopup)
<!-- Welcome Popup Modal -->
<div class="modal fade" id="welcomePopupModal" tabindex="-1" role="dialog" aria-labelledby="welcomePopupLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border: 3px solid #ff6600; max-height: 90vh; overflow: hidden;">
            <div class="modal-header border-0" style="padding: 10px 15px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeWelcomePopup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0" style="max-height: calc(90vh - 60px); overflow-y: auto;">
                <img src="{{ asset('storage/' . $welcomePopup->image) }}" 
                     class="img-fluid w-100" 
                     alt="Welcome to Gurukul Takshila"
                     style="border-radius: 0 0 8px 8px; display: block;">
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Check if popup has been shown in this session
    if (!sessionStorage.getItem('welcomePopupShown')) {
        // Show popup after 1 second delay
        setTimeout(function() {
            $('#welcomePopupModal').modal('show');
        }, 1000);
    }
    
    // Mark popup as shown when closed
    $('#closeWelcomePopup, #welcomePopupModal').on('hidden.bs.modal', function() {
        sessionStorage.setItem('welcomePopupShown', 'true');
    });
});
</script>

<style>
#welcomePopupModal .modal-content {
    border: none;
    border-radius: 8px;
    overflow: hidden;
}

#welcomePopupModal .close {
    position: absolute;
    right: 15px;
    top: 10px;
    z-index: 1;
    color: #fff;
    text-shadow: 0 1px 3px rgba(0,0,0,0.5);
    opacity: 1;
    font-size: 2rem;
    font-weight: 300;
}

#welcomePopupModal .close:hover {
    color: #f8f9fa;
    opacity: 1;
}
</style>
@endif
