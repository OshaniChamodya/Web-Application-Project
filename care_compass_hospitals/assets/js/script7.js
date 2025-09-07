function validatebillForm() {
    const patientName = document.getElementById("patientName").value;
    const patientID = document.getElementById("patientID").value;
    const invoiceNo = document.getElementById("invoiceNo").value;
    const amount = document.getElementById("amount").value;
    const paymentMethod = document.getElementById("paymentMethod").value;

    if (patientName === "") {
        alert("Please enter the patient's name.");
        return false;
    }

    if (patientID === "") {
        alert("Please enter the patient's ID.");
        return false;
    }

    if (invoiceNo === "") {
        alert("Please enter the invoice number.");
        return false;
    }

    if (amount === "" || parseFloat(amount) <= 0) {
        alert("Please enter a valid amount.");
        return false;
    }

    if (paymentMethod === "") {
        alert("Please select a payment method.");
        return false;
    }

    return true;
}
