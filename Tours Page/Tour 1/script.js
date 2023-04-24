const ticketForm = document.getElementById('ticket-form');
const adultTicketInput = document.getElementById('adult-ticket');
const seniorTicketInput = document.getElementById('senior-ticket');
const youthTicketInput = document.getElementById('youth-ticket');
const childTicketInput = document.getElementById('child-ticket');
const totalPriceSpan = document.getElementById('total-price');
const hiddenPriceInput = document.getElementById('hidden-price');
const dateInput = document.getElementById('date');
const timeSelect = document.getElementById('time');
const purchaseMessage = document.getElementById('purchase-message');

const museumHours = {
  monday: [],
  tuesday: [],
  wednesday: ["11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"],
  thursday: ["11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"],
  friday: ["11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"],
  saturday: ["11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"],
  sunday: ["11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"],
};

function updateTotalPrice() {
  let totalPrice = 0;
  const selectedDate = new Date(dateInput.value);
  const selectedDay = selectedDate.toLocaleDateString('en-US', { weekday: 'long', timeZone: 'UTC' }).toLowerCase();
  console.log(selectedDay);
  if (selectedDay === 'monday' || selectedDay === 'tuesday') {
    totalPriceSpan.textContent = 'The museum is closed on Monday and Tuesday.';
  } else {
    if (adultTicketInput.value !== '') {
      const adultTickets = parseInt(adultTicketInput.value);
      totalPrice += adultTickets * 15;
    }
    if (seniorTicketInput.value !== '') {
      const seniorTickets = parseInt(seniorTicketInput.value);
      totalPrice += seniorTickets * 13;
    }
    if (youthTicketInput.value !== '') {
      const youthTickets = parseInt(youthTicketInput.value);
      totalPrice += youthTickets * 10;
    }
    if (childTicketInput.value !== '') {
      const childTickets = parseInt(childTicketInput.value);
      totalPrice += childTickets * 10;
    }
    if (museumHours[selectedDay].includes(timeSelect.value)) {
      totalPriceSpan.textContent = `$${totalPrice}`;
      hiddenPriceInput.value = totalPrice;
    } else {
      totalPriceSpan.textContent = 'The museum is closed at the selected date and time.';
    }
  }
}

dateInput.addEventListener('change', function() {
  updateTotalPrice();
});

timeSelect.addEventListener('change', function() {
  updateTotalPrice();
});

adultTicketInput.addEventListener('change', function() {
  updateTotalPrice();
});

seniorTicketInput.addEventListener('change', function() {
  updateTotalPrice();
});

youthTicketInput.addEventListener('change', function() {
  updateTotalPrice();
});

childTicketInput.addEventListener('change', function() {
  updateTotalPrice();
});

ticketForm.addEventListener('submit', function(event) {
  event.preventDefault();
  const totalPrice = hiddenPriceInput.value;
  const paymentConfirmation = confirm(`Your total is $${totalPrice}. Press OK to confirm purchase.`);
  if (paymentConfirmation) {
    alert('Tickets have been purchased successfully!');
    location.reload();
    ticketForm.reset();
  }
});

window.addEventListener('unload', function() {
  // Clear the form data
  ticketForm.reset();
});
