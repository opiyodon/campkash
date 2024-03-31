// Assuming you have fetched the data from the database and stored it in appropriate variables
const loanData = [12000, 19000, 3000, 5000, 2000, 3000]; // Loan transaction amounts
const paymentData = [8000, 15000, 2500, 4000, 1800, 2500]; // Payment transaction amounts
const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']; // Months

const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: months,
    datasets: [
      {
        label: 'Loan Transactions',
        data: loanData,
        backgroundColor: 'rgba(255, 99, 132, 0.6)', // Customize the color
        borderWidth: 1,
      },
      {
        label: 'Payment Transactions',
        data: paymentData,
        backgroundColor: 'rgba(54, 162, 235, 0.6)', // Customize the color
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          callback: function (value) {
            return '$' + value; // Display amounts with a dollar sign
          },
        },
      },
    },
  },
});
