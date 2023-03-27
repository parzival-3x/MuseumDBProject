const ticketForm = document.getElementById('ticket-form');
const adultTicketInput = document.getElementById('adult-ticket');
const seniorTicketInput = document.getElementById('senior-ticket');
const youthTicketInput = document.getElementById('youth-ticket');
const childTicketInput = document.getElementById('child-ticket');
const totalPriceSpan = document.getElementById('total-price');
const dateInput = document.getElementById('date');
const timeSelect = document.getElementById('time');

const museumHours = {
  monday: [],
  tuesday: [],
  wednesday: ["11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"],
  thursday: ["11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"],
  friday: ["11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"],
  saturday: ["11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"],
  sunday: ["11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"],
};

ticketForm.addEventListener('submit', function(event) {
  event.preventDefault();
  let totalPrice = 0;
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
  const selectedDate = new Date(dateInput.value);
  const selectedDay = selectedDate.toLocaleDateString('en-US', { weekday: 'long' }).toLowerCase();
  if (selectedDay === 'monday' || selectedDay === 'tuesday') {
    const warning = document.createElement('p');
    warning.textContent = 'The museum is closed on Monday and Tuesday. Please select another day.';
    warning.classList.add('warning');
    ticketForm.appendChild(warning);
    setTimeout(function() {
      warning.remove();
    }, 5000);
  } else if (museumHours[selectedDay].includes(timeSelect.value)) {
    totalPriceSpan.textContent = `$${totalPrice}`;
  } else {
    const warning = document.createElement('p');
    warning.textContent = 'The museum is closed at the selected date and time. Please select another date or time.';
    warning.classList.add('warning');
    ticketForm.appendChild(warning);
    setTimeout(function() {
      warning.remove();
    }, 5000);
  }
});
