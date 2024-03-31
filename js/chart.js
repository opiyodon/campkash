// user dashboard chart
const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: months,
    datasets: [
      {
        label: 'Total Loan Transactions',
        data: loanData,
        backgroundColor: '#09b498', // Customize the color
        borderWidth: 1,
      },
      {
        label: 'Total Payment Transactions',
        data: paymentData,
        backgroundColor: '#407ce4', // Customize the color
        borderWidth: 1,
      },
    ],
  },
  options: {
    plugins: {
      title: {
        display: true,
        text: 'Total Loan and Payment Transactions', // Add your chart title here
        font: {
          size: 20,
        },
      },
    },
    scales: {
      y: {
        beginAtZero: true,
        title: {
          display: true,
          text: 'Amount (KES)', // Add your y-axis label here
        },
        ticks: {
          callback: function (value) {
            return 'KES ' + value; // Display amounts with a dollar sign
          },
        },
      },
      x: {
        title: {
          display: true,
          text: 'Months', // Add your x-axis label here
        },
      },
    },
  },
});


// admin dashboard chart
const revenueData = [12000, 19000, 3000, 5000, 2000, 3000]; // Loan transaction amounts
const adminMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']; // adminMonths

const admin_ctx = document.getElementById('myAdminChart');

new Chart(admin_ctx, {
  type: 'bar',
  data: {
    labels: adminMonths,
    datasets: [
      {
        label: 'Revenue Generated',
        data: revenueData,
        backgroundColor: '#407ce4', // Customize the color
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
            return 'KES ' + value; // Display amounts with a dollar sign
          },
        },
      },
    },
  },
});
