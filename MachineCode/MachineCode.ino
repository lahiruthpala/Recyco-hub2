// https://github.com/francesco-scar/LiquidCrystal_Software_I2C
// Based on https://github.com/johnrickman/LiquidCrystal_I2C project

#include <LiquidCrystal_Software_I2C.h>     // Include library

// Usage: LiquidCrystal_I2C lcd(ADDRESS, COLUMNS, ROWS, SDA_PIN, SCL_PIN);
LiquidCrystal_I2C lcd(0x27, 16, 2, 4, 5);   // Set the LCD address to 0x27 for a 16 chars and 2 line display

void setup() {
  lcd.init();                               // LCD initialization
  lcd.backlight();                          // Turn on backlight
  lcd.print("Hello, world!");               // Print Hello, world!
}

void loop() {
}