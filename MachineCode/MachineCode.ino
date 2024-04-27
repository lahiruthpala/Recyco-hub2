

#include <WiFi.h>
#include <PubSubClient.h>
#include <WiFiClientSecure.h>
#include <SPI.h>
#include <ArduinoJson.h>
#include <Keypad.h>
#include <vector>
#include <LiquidCrystal_Software_I2C.h>
#define NumTypes 4
LiquidCrystal_I2C lcd(0x27, 16, 2, 4, 5);

using namespace std;
// ***ADD VARIABLE BELOW INITIAL CONFIG***
//---- WiFi settings
const char *ssid = "DESKTOP-QC0EJRU 8105";
const char *password = "Lahiru@28";

//---- MQTT Broker settings
const char *mqtt_server = "cfdcd9bc.ala.asia-southeast1.emqxsl.com"; // replace with your broker url
const char *mqtt_username = "lahiruthpala";
const char *mqtt_password = "Lahiru@28";
const int mqtt_port = 8883;

//===========================
WiFiClientSecure espClient;
PubSubClient client(espClient);
unsigned long lastMsg = 0;
#define MSG_BUFFER_SIZE (50)
char msg[MSG_BUFFER_SIZE];
//============= Configure OUTPUT Here============================

// const char* sensor1_topic= "PUBLISH MSG NAME";

//============= Config Command Here==============================
// const char* command1_topic="command1";
// const char* command1_topic="command2";
static const char *root_ca PROGMEM = R"EOF(
-----BEGIN CERTIFICATE-----
MIIDrzCCApegAwIBAgIQCDvgVpBCRrGhdWrJWZHHSjANBgkqhkiG9w0BAQUFADBh
MQswCQYDVQQGEwJVUzEVMBMGA1UEChMMRGlnaUNlcnQgSW5jMRkwFwYDVQQLExB3
d3cuZGlnaWNlcnQuY29tMSAwHgYDVQQDExdEaWdpQ2VydCBHbG9iYWwgUm9vdCBD
QTAeFw0wNjExMTAwMDAwMDBaFw0zMTExMTAwMDAwMDBaMGExCzAJBgNVBAYTAlVT
MRUwEwYDVQQKEwxEaWdpQ2VydCBJbmMxGTAXBgNVBAsTEHd3dy5kaWdpY2VydC5j
b20xIDAeBgNVBAMTF0RpZ2lDZXJ0IEdsb2JhbCBSb290IENBMIIBIjANBgkqhkiG
9w0BAQEFAAOCAQ8AMIIBCgKCAQEA4jvhEXLeqKTTo1eqUKKPC3eQyaKl7hLOllsB
CSDMAZOnTjC3U/dDxGkAV53ijSLdhwZAAIEJzs4bg7/fzTtxRuLWZscFs3YnFo97
nh6Vfe63SKMI2tavegw5BmV/Sl0fvBf4q77uKNd0f3p4mVmFaG5cIzJLv07A6Fpt
43C/dxC//AH2hdmoRBBYMql1GNXRor5H4idq9Joz+EkIYIvUX7Q6hL+hqkpMfT7P
T19sdl6gSzeRntwi5m3OFBqOasv+zbMUZBfHWymeMr/y7vrTC0LUq7dBMtoM1O/4
gdW7jVg/tRvoSSiicNoxBN33shbyTApOB6jtSj1etX+jkMOvJwIDAQABo2MwYTAO
BgNVHQ8BAf8EBAMCAYYwDwYDVR0TAQH/BAUwAwEB/zAdBgNVHQ4EFgQUA95QNVbR
TLtm8KPiGxvDl7I90VUwHwYDVR0jBBgwFoAUA95QNVbRTLtm8KPiGxvDl7I90VUw
DQYJKoZIhvcNAQEFBQADggEBAMucN6pIExIK+t1EnE9SsPTfrgT1eXkIoyQY/Esr
hMAtudXH/vTBH1jLuG2cenTnmCmrEbXjcKChzUyImZOMkXDiqw8cvpOp/2PV5Adg
06O/nVsJ8dWO41P0jmP6P6fbtGbfYmbW0W5BjfIttep3Sp+dWOIrWcBAI+0tKIJF
PnlUkiaY4IBIqDfv8NZ5YBberOgOzW6sRBc4L0na4UU+Krk2U886UAb3LujEV0ls
YSEY1QSteDwsOoBrp+uvFRTp2InBuThs4pFsiv9kuXclVzDAGySj4dzp30d8tbQk
CAUw7C29C79Fv1C5qfPrmAESrciIxpg0X40KPMbp1ZWVbd4=
-----END CERTIFICATE-----
)EOF";
String topic;
String messageTemp;
String message;
String clientId = "MID1712542744n5eZ";

void callback(char *topic, byte *payload, unsigned int length)
{
    String incommingMessage = "";
    for (int i = 0; i < length; i++)
        incommingMessage += (char)payload[i];
    // JSON decoding
    Serial.println(incommingMessage);
    Serial.println("++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");
    DynamicJsonDocument doc(1024);
    DeserializationError error = deserializeJson(doc, incommingMessage);
    if (error)
    {
        Serial.println("Error decoding JSON: ");
        Serial.println(error.c_str());
        return;
    }
    serializeJson(doc, Serial);
    Serial.println("-------------------------------------------------------------------------------------------------------");
    Serial.println(doc["Action"].as<String>());
    if (doc["Action"].as<String>() == "CreateSortingJob")
    {
        Serial.println(">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>CreateSortingJob if condition<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<");
        CreateSortingJob(doc);
    }
    else if (doc["Action"].as<String>() == "InventoriesCreated")
    {
        Serial.println(">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>InventoriesCreated if condition<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<");
        InventoriesCreated(doc);
    }
    else if (doc["Action"].as<String>() == "UpdateHistory")
    {
        UpdateHistory(doc);
    }
}

void reconnect()
{
    // Loop until we're reconnected
    while (!client.connected())
    {
        Serial.println("Attempting MQTT connection...");
        lcd.clear();
        lcd.print("Attempting MQTT connection...");
        // Attempt to connect
        if (client.connect(clientId.c_str(), mqtt_username, mqtt_password))
        {
            Serial.println("connected");
            lcd.clear();
            lcd.print("Connected!");
            String temp = "{\"Action\":\"GetHistory\",\"Machine_ID\":\"MID1712542744n5eZ\"}";
            publishMessage("Recycohub", temp, false);
            // SUBSCRIBE TO TOPIC HERE

            client.subscribe("Recycohub");
        }
        else
        {
            Serial.println("failed, rc=");
            Serial.println(client.state());
            Serial.println(" try again in 5 seconds"); // Wait 5 seconds before retrying
            delay(5000);
        }
    }
}
//============================================ADD USER VARIABLE HERE====================================
int set = 0;
int in_use = 0;
String Machine_ID = "MID1712542744n5eZ";
String Sorting_Job_ID = "";
String waste_type = "";
char *defaultInventorID = "0000000000000000000";
vector<String> SortingInventory_IDs;

char *SortingTo[NumTypes][3] = {
    {"PETE", "50", strdup(defaultInventorID)},
    {"HDPE", "50", strdup(defaultInventorID)},
    {"PVC", "50", strdup(defaultInventorID)},
    {"Polystyrene", "50", strdup(defaultInventorID)}};

const byte ROWS = 4;
const byte COLS = 4;

char hexaKeys[ROWS][COLS] = {
    {'1', '2', '3', 'A'},
    {'4', '5', '6', 'B'},
    {'7', '8', '9', 'C'},
    {'*', '0', '#', 'D'}};

byte rowPins[ROWS] = {42, 41, 40, 39};
byte colPins[COLS] = {38, 37, 36, 35};
Keypad customKeypad = Keypad(makeKeymap(hexaKeys), rowPins, colPins, ROWS, COLS);

void setup()
{
    lcd.init();
    lcd.backlight();
    lcd.cursor_on();
    lcd.blink_on();
    //=========================NO TOUCHY==============================================================
    Serial.begin(115200);
    Serial.println("\nConnecting to ");
    lcd.print("Connecting to ");
    Serial.println(ssid);
    lcd.print(ssid);
    WiFi.mode(WIFI_STA);
    WiFi.begin(ssid, password);
    client.setCallback(callback);
    while (WiFi.status() != WL_CONNECTED)
    {
        delay(500);
        Serial.print(".");
        lcd.print(".");
    }
    randomSeed(micros());
    Serial.println("\nWiFi connected\nIP address: ");
    lcd.clear();
    lcd.print("Connected");
    Serial.println(WiFi.localIP());
    while (!Serial)
        delay(1);
    espClient.setCACert(root_ca);
    client.setServer(mqtt_server, mqtt_port);
    client.setCallback(callback);
    delay(1000);
    String temp = "{\"Action\":\"GetHistory\",\"Machine_ID\":\"MID1712542744n5eZ\"}";
    publishMessage("Recycohub", temp, false);
    //==================================ADD USER SETUP HERE===================================================
    // Create JSON object
}

void loop()
{
    //============== NO TOUCHY=======================
    if (!client.connected())
        reconnect();
    client.loop();
    //============== ADD LOOP CODE HERE==============
    if (Serial.available())
    {
        int input = Serial.parseInt();
        if (input == 1)
        {
            Serial.print("in_use: ");
            Serial.println(in_use);
            Serial.print("Sorting_Job_ID: ");
            Serial.println(Sorting_Job_ID);
            Serial.print("waste_type: ");
            Serial.println(waste_type);
            Serial.print("SortingInventory_IDs: ");
            for (String s : SortingInventory_IDs)
            {
                Serial.print(s);
                Serial.print(" ");
            }
            Serial.println();
            Serial.print("defaultInventorID");
            Serial.println(defaultInventorID);
            Serial.println("SortingTo:");
            for (int i = 0; i < NumTypes; i++)
            {
                for (int j = 0; j < 3; j++)
                {
                    Serial.print(SortingTo[i][j]);
                    Serial.print(" ");
                }
                Serial.println();
            }
        }
    }
    char customKey = customKeypad.getKey();

    if (customKey)
    {
        if (customKey == '#')
        {
            UpdateSortingJobStatus();
        }
        if (customKey == 'A')
        {
            DisplaySortingToInventories();
        }
        if (customKey == 'B')
        {
            DisplaySortingInventories();
        }
        if (customKey == 'C')
        {
            SortingJobInventoryUpdate();
        }
    }

    //===============Publish MQTT MESSAGE=======================

    // publishMessage(sensor1_topic,String(VARIABLE TO PUBLISH HERE),true);
}

//======================================= publising as string
void publishMessage(const char *topic, String payload, boolean retained)
{
    Serial.println(payload);
    if (client.publish(topic, payload.c_str(), retained))
        Serial.println("Message publised [" + String(topic) + "]: " + payload);
}

void CreateSortingJob(DynamicJsonDocument &doc)
{
    Serial.println(">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>CreateSortingJob<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n");
    Sorting_Job_ID = doc["Sorting_Job_ID"].as<String>();
    waste_type = doc["waste_type"].as<String>();
    JsonArray array = doc["Inventory_IDs"].as<JsonArray>();

    // Convert JSON array to string
    for (size_t i = 0; i < array.size(); i++)
    {
        SortingInventory_IDs.push_back(array[i].as<String>());
    }

    in_use = 1;
    int numRows = sizeof(SortingTo) / sizeof(SortingTo[0]);
    String InventoryTypesNeeded;
    String InventoryTypesHave;
    Serial.println(numRows);
    for (int i = 0; i < numRows; i++)
    {
        Serial.println(i);
        if (strcmp(SortingTo[i][2], defaultInventorID) == 0)
        {
            InventoryTypesNeeded += ",";
            InventoryTypesNeeded += SortingTo[i][0];
            Serial.print("InventoryTypesNeeded - ");
            Serial.println(InventoryTypesNeeded);
        }
        else
        {
            InventoryTypesHave += ",";
            InventoryTypesHave += SortingTo[i][0];
            Serial.print("InventoryTypesHave - ");
            Serial.println(InventoryTypesHave);
        }
    }
    if (InventoryTypesNeeded.length() > 0)
    {
        CreateInventories(InventoryTypesNeeded);
    }
    Serial.print("InventoryTypesHavelenght - ");
    Serial.println(InventoryTypesHave.length());
    if (InventoryTypesHave.length() > 0)
    {
        UpdateInventory(InventoryTypesHave);
    }
    lcd.clear();
    lcd.print("Sorting Job ID:");
    lcd.setCursor(0, 1);
    lcd.print(Sorting_Job_ID);
}

void CreateInventories(String InventoryTypesNeeded)
{
    Serial.println(">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>CreateInventories if condition<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<");
    lcd.clear();
    lcd.print("Creating Inventories");
    DynamicJsonDocument inventoriesDoc(1024);
    inventoriesDoc["Action"] = "CreateInventories";
    inventoriesDoc["Sorting_Job_ID"] = Sorting_Job_ID;
    JsonArray typesArray = inventoriesDoc.createNestedArray("Types");
    // Add inventory types to the array
    String type;
    for (int i = 1; i < InventoryTypesNeeded.length(); i++)
    {
        if (InventoryTypesNeeded[i] == ',')
        {
            typesArray.add(type);
            type = "";
        }
        else
        {
            type += InventoryTypesNeeded[i];
        }
    }
    typesArray.add(type); // Add the last type
    String inventoriesJson;
    serializeJson(inventoriesDoc, inventoriesJson);
    publishMessage("Recycohub", inventoriesJson, false);
}

void InventoriesCreated(DynamicJsonDocument &doc)
{
    Serial.println(">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>InventoriesCreated if condition<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<");
    lcd.clear();
    lcd.print("Inven Created");
    if (doc.containsKey("Inventory_IDs"))
    {
        JsonArray inventoryIds = doc["Inventory_IDs"].as<JsonArray>();
        int i = 0;
        for (const auto &inventory : inventoryIds)
        {
            String inventoryId = inventory[0].as<String>();
            String type = inventory[1].as<String>();
            // Assign the values to pre-defined variables here
            // For example:
            Serial.println(inventoryId);
            strcpy(SortingTo[i][2], inventoryId.c_str());
            i++;
        }
    }
}

void UpdateInventory(String InventoryTypesHave)
{
    Serial.println(">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>UpdateInventory if condition<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<");
    DynamicJsonDocument updateInventoryDoc(1024);
    updateInventoryDoc["Action"] = "UpdateInventory";
    updateInventoryDoc["Sorting_Job_ID"] = Sorting_Job_ID;
    JsonArray inventoriesArray = updateInventoryDoc.createNestedArray("Inventories");
    for (int i = 0; i < sizeof(SortingTo) / sizeof(SortingTo[0]); i++)
    {
        JsonArray inventory = inventoriesArray.createNestedArray();
        inventory.add(SortingTo[i][2]);
        inventory.add(SortingTo[i][0]);
    }
    String updateInventoryJson;
    serializeJson(updateInventoryDoc, updateInventoryJson);
    Serial.println(updateInventoryJson);
    publishMessage("Recycohub", updateInventoryJson, false);
}

void UpdateSortingJobStatus()
{
    Serial.println(">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>UpdateSortingJobStatus if condition<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<");
    DynamicJsonDocument updateStatusDoc(1024);
    updateStatusDoc["Action"] = "UpdateSortingJobStatus";
    updateStatusDoc["Sorting_Job_ID"] = Sorting_Job_ID;
    updateStatusDoc["Machine_ID"] = clientId;
    updateStatusDoc["Status"] = "Completed";
    String updateStatusJson;
    serializeJson(updateStatusDoc, updateStatusJson);
    Serial.println(updateStatusJson);
    publishMessage("Recycohub", updateStatusJson, false);
    lcd.clear();
    lcd.print("Sorting Completed");
}

void UpdateInventoryStatus(String Inventory_ID, String Model)
{
    Serial.println(">>>>>>>>>>>>>>>>>>>>>>>>>>>>      UpdateInventoryStatus if condition     <<<<<<<<<<<<<<<<<<<<<<<<<<<");
    DynamicJsonDocument updateStatusDoc(1024);
    updateStatusDoc["Action"] = "UpdateInventoryStatus";
    updateStatusDoc["Model"] = Model;
    updateStatusDoc["Inventory_ID"] = Inventory_ID;
    updateStatusDoc["Status"] = "Sorted";
    String updateStatusJson;
    serializeJson(updateStatusDoc, updateStatusJson);
    Serial.println(updateStatusJson);
    publishMessage("Recycohub", updateStatusJson, false);
    lcd.clear();
    lcd.print("Inventory Updated");
}

void DisplaySortingToInventories()
{
    Serial.println(">>>>>>>>>>>>>>>>>>>>>>>>>>>>       Display Sorting To Inventories     <<<<<<<<<<<<<<<<<<<<<<<<<<<<<");
    int numRows = sizeof(SortingTo) / sizeof(SortingTo[0]);
    Serial.println("Select the inventory ID");
    lcd.clear();
    lcd.print("Inventory ID -> ");
    for (int i = 0; i < numRows; i++)
    {
        lcd.setCursor(0, 1);
        lcd.print(i + 1);
        Serial.print(SortingTo[i][2]);
        Serial.print(" - ");
        lcd.print(" - ");
        Serial.println(i + 1);
        lcd.print(SortingTo[i][2]);
        while (true)
        {
            char customKey = customKeypad.getKey();
            if (customKey)
            {
                if (customKey == '#')
                {
                    break;
                }
            }
        }
        lcd.clear();
        lcd.print(i + 1);
        lcd.print(" -> ");
        lcd.print(SortingTo[i][2]);
        lcd.setCursor(0, 1);
    }
    int temp = 0;
    while (temp == 0)
    {
        char customKey = customKeypad.getKey();
        if (customKey)
        {
            Serial.println(customKey);
            int num = customKey;
            Serial.println(num);
            lcd.print(num - 48);
            if (num == 0)
            {
                temp = 1;
            }
            else
            {
                UpdateInventoryStatus(String(SortingTo[num - 49][2]), "SortedInventory");
                temp = 1;
            }
        }
    }
}

void DisplaySortingInventories()
{
    Serial.println(">>>>>>>>>>>>>>>>>>>>>>>>>>>>       Display Sorting Inventories     <<<<<<<<<<<<<<<<<<<<<<<<<<<<<");
    Serial.println("Select the inventory ID");
    for (int i = 0; i < SortingInventory_IDs.size(); i++)
    {
        lcd.setCursor(0, 1);
        lcd.print(i + 1);
        Serial.print(SortingInventory_IDs.at(i));
        Serial.print(" - ");
        lcd.print(" - ");
        Serial.println(i + 1);
        lcd.print(SortingInventory_IDs.at(i));
        while (true)
        {
            char customKey = customKeypad.getKey();
            if (customKey)
            {
                if (customKey == '#')
                {
                    break;
                }
            }
        }
        lcd.clear();
        lcd.print(i + 1);
        lcd.print(" -> ");
        lcd.print(SortingInventory_IDs.at(i));
        lcd.setCursor(0, 1);
    }
    int temp = 0;
    lcd.print("Inven ID -> ");
    while (temp == 0)
    {
        char customKey = customKeypad.getKey();
        if (customKey)
        {
            Serial.println(customKey);
            int num = customKey;
            Serial.println(num);
            lcd.print(num - 48);
            if (num - 48 == 0)
            {
                temp = 1;
            }
            else
            {
                UpdateInventoryStatus(SortingInventory_IDs.at(num - 49), "InventoryModel");
                temp = 1;
            }
        }
    }
}

// working
void SortingJobInventoryUpdate()
{
    lcd.clear();
    Serial.println(">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>SortingJobInventoryUpdate if condition<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<");
    Serial.println("Select the inventory ID");
    for (int i = 0; i < SortingInventory_IDs.size(); i++)
    {
        Serial.print(SortingInventory_IDs.at(i));
        lcd.print(i + 1);
        lcd.print(" - ");
        lcd.print(SortingInventory_IDs.at(i));
        Serial.print(" - ");
        Serial.println(i + 1);
        lcd.setCursor(0, 1);
    }
    int temp = 0;
    while (temp == 0)
    {
        char customKey = customKeypad.getKey();
        if (customKey)
        {
            Serial.println(customKey);
            int num = customKey;
            Serial.println(num);
            if (num - 48 == 0)
            {
                temp = 1;
            }
            else
            {
                DynamicJsonDocument updateStatusDoc(1024);
                updateStatusDoc["Action"] = "SortingJobInventoryUpdate";
                updateStatusDoc["Inventory_ID"] = SortingInventory_IDs.at(num - 49);
                JsonArray WeightArray = updateStatusDoc.createNestedArray("Weight");
                Serial.println("Enter the weights(#Kg)->");
                lcd.clear();
                lcd.print("Enter the weights");
                lcd.setCursor(0, 1);
                for (int i = 0; i < NumTypes; i++)
                {
                    JsonArray nestedArray = WeightArray.createNestedArray();
                    nestedArray.add(SortingTo[i][0]);
                    Serial.print(SortingTo[i][0]);
                    lcd.print(SortingTo[i][0]);
                    lcd.print(" -> ");
                    Serial.print(" -> ");
                    String temp2 = "";
                    customKey = 'N';
                    while (customKey != '#')
                    {
                        customKey = customKeypad.getKey();
                        if (customKey)
                        {
                            if (customKey != '#')
                            {
                                Serial.print(customKey);
                                lcd.print(customKey);
                                temp2 += customKey;
                            }
                        }
                    }
                    nestedArray.add(temp2);
                    Serial.println();
                    lcd.clear();
                    lcd.print(SortingTo[i][0]);
                    lcd.print(" -> ");
                    lcd.print(temp2);
                    lcd.setCursor(0, 1);
                }
                String updateStatusJson;
                serializeJson(updateStatusDoc, updateStatusJson);
                Serial.println(updateStatusJson);
                publishMessage("Recycohub", updateStatusJson, false);
                temp = 1;
                lcd.clear();
                lcd.print("Inventory Updated");
            }
        }
    }
}

void UpdateHistory(DynamicJsonDocument &doc)
{
    if (doc.containsKey("Sorting_Job_ID"))
    {
        Sorting_Job_ID = doc["Sorting_Job_ID"].as<String>();
    }
    if (doc.containsKey("Inventory_IDs"))
    {
        JsonArray array = doc["Inventory_IDs"].as<JsonArray>();

        // Convert JSON array to string
        for (size_t i = 0; i < array.size(); i++)
        {
            SortingInventory_IDs.push_back(array[i].as<String>());
        }
    }
    if (doc.containsKey("SortingTo"))
    {
        JsonArray inventoryIds = doc["SortingTo"].as<JsonArray>();
        int i = 0;
        for (const auto &inventory : inventoryIds)
        {
            String inventoryId = inventory[0].as<String>();
            String type = inventory[1].as<String>();
            // Assign the values to pre-defined variables here
            // For example:
            Serial.println(inventoryId);
            strcpy(SortingTo[i][2], inventoryId.c_str());
            i++;
        }
    }
    lcd.clear();
    lcd.print("History Updated");
    lcd.setCursor(0, 1);
    set = 1;
    if (doc.containsKey("Sorting_Job_ID"))
    {
        lcd.print("Sorting");
    }
    else
    {
        lcd.print("No Sorting Job");
    }
}