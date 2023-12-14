function limitString(inputString, maxLength) {
    // Check if the length of the string is greater than the maximum length
    if (inputString.length > maxLength) {
        // Trim the string to the specified length
        var trimmedString = inputString.substring(0, maxLength);

        // Add "..." to indicate that the string has been trimmed
        trimmedString += "...";

        return trimmedString;
    } else {
        // If the string is within the limit, return the original string
        return inputString;
    }
}