import React from "react";

const Modal = ({ handleClose, show, children }) => {
  const showHideClassName = show ? "modal d-block bc-modal" : "modal d-none";

  return (
    <div className={showHideClassName}>
      <div className="modal-dialog">
        <div className="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">User Details</h5>
            <button type="button" class="btn-close" onClick={handleClose} aria-label="Close"></button>
          </div>
          <div class="modal-body">
            {children}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onClick={handleClose}>Close</button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Modal;