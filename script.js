// 🎯 Seat selection system
function initSeats(bookedSeats) {
    let selectedSeats = [];
    let seatsDiv = document.getElementById("seats");

    for (let i = 1; i <= 20; i++) {
        let seat = document.createElement("div");
        seat.classList.add("seat");
        seat.innerText = i;

        // 🔴 booked
        if (bookedSeats.includes(i)) {
            seat.classList.add("booked");
        } else {
            seat.onclick = function () {
                if (selectedSeats.includes(i)) {
                    selectedSeats = selectedSeats.filter(s => s !== i);
                    seat.classList.remove("selected");
                } else {
                    selectedSeats.push(i);
                    seat.classList.add("selected");
                }

                document.getElementById("seatInput").value = selectedSeats.join(",");

                document.getElementById("selectedText").innerText =
                    selectedSeats.length > 0
                        ? "Selected Seats: " + selectedSeats.join(", ")
                        : "Selected Seats: None";
            };
        }

        seatsDiv.appendChild(seat);
    }
}


// 💳 Payment animation
function processPayment() {
    let box = document.getElementById("paymentBox");

    setTimeout(() => {
        box.innerHTML = "<h1 style='color:white;'>Processing Payment...</h1>";
    }, 100);
}