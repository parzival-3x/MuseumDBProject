const zoneForm = document.getElementById('zone-form');
const zoneSelect = document.getElementById('zone-select');
const rateList = document.getElementById('rate-list');
const paymentSection = document.getElementById('payment-section');
const paymentForm = document.getElementById('payment-form');
const hoursInput = document.getElementById('hours-input');
const emailInput = document.getElementById('email-input');
const cardNumberInput = document.getElementById('card-number-input');
const expiryInput = document.getElementById('expiry-input');
const cvvInput = document.getElementById('cvv-input');
const licensePlateInput = document.getElementById('license-plate-input');

const hourlyRates = {
  'zone-a': 15,
  'zone-b': 10,
  'zone-c': 7,
};

zoneForm.addEventListener('submit', function(event) {
  event.preventDefault();
  const selectedZone = zoneSelect.value;
  if (selectedZone === '') {
    return;
  }
  const rate = hourlyRates[selectedZone];
  rateList.innerHTML = `<li><strong>${selectedZone.toUpperCase()}:</strong> $${rate} per hour</li>`;
  paymentSection.classList.remove('hidden');
});

paymentForm.addEventListener('submit', function(event) {
  event.preventDefault();
  const hours = parseInt(hoursInput.value);
  const rate = hourlyRates[zoneSelect.value];
  const total = hours * rate;
  const email = emailInput.value;
  const licensePlate = licensePlateInput.value;
  alert(`Thank you for your payment of $${total.toFixed(2)}. An email has been sent to ${email} with your parking pass.`);
  paymentForm.reset();
  paymentSection.classList.add('hidden');
});
