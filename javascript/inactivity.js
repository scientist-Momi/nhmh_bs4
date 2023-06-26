// Set the number of minutes of inactivity before logging out
const inactivityTimeoutMinutes = 600;

// Initialize a variable to store the timeout ID
let inactivityTimeoutId;

// Reset the timeout function
const resetInactivityTimeout = () => {
  // Clear any existing timeout
  clearTimeout(inactivityTimeoutId);

  // Set a new timeout
  inactivityTimeoutId = setTimeout(logoutUser, inactivityTimeoutMinutes * 60 * 1000);
};

// Call the reset function whenever there is user activity
document.addEventListener("mousemove", resetInactivityTimeout);
document.addEventListener("keypress", resetInactivityTimeout);

// Define the logout function
const logoutUser = () => {
  // Perform any necessary logout actions, such as redirecting to a login page or clearing session data
    // console.log("User has been logged out due to inactivity.");
    location.href = "models/logout.php";
};
