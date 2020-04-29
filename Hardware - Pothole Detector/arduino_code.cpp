
#include <TinyGPS++.h>
#include <SoftwareSerial.h>
#include<ESP8266WiFi.h>


TinyGPSPlus gps;  

SoftwareSerial ss(4,5);

const char* ssid="MOTO";//wifi name
const char* password="ucarp5u2dn";//wifi password
const char* host="192.168.43.243";
const uint16_t port=80;


long duration;
int distance;
long duration2;
int distance2;


float latitude , longitude;
int year , month , date, hour , minute , second;
String date_str , time_str , lat_str , lng_str;
int pm;


void setup() {
  pinMode(2, OUTPUT);
  pinMode(14, INPUT);
  pinMode(15, OUTPUT);
  pinMode(12, INPUT);

 Serial.begin(115200);
 ss.begin(9600);                                                                                                                                
 Serial.println("STARTING CONNECTION TO WIFI");
 WiFi.mode(WIFI_STA);
 WiFi.begin(ssid,password);
 while(WiFi.status()!=WL_CONNECTED)
 {Serial.print(".");
 delay(500);
}
Serial.println("CONNECTED TO WIFI");
Serial.print("IP:");
Serial.println(WiFi.localIP());
}

void loop(){

while (ss.available() > 0)
    if (gps.encode(ss.read()))
    {
      if (gps.location.isValid())
      {
        latitude = gps.location.lat();
        lat_str = String(latitude , 6);
        longitude = gps.location.lng();
        lng_str = String(longitude , 6);
        
        String l="";
        String lengthh="";
        digitalWrite(2, LOW);   
        delayMicroseconds(2);       
  
        digitalWrite(2, HIGH);  
        delayMicroseconds(10);     
        digitalWrite(2, LOW); 
        duration = pulseIn(14, HIGH);   
        distance= duration*0.034/2;

        //distance 2
        digitalWrite(15, LOW);   
        delayMicroseconds(2);       
  
        digitalWrite(15, HIGH);  
        delayMicroseconds(10);       
        digitalWrite(15, LOW);   

        duration2 = pulseIn(12, HIGH);   
        distance2= duration2*0.034/2;



        

        Serial.print("Distance 1 = ");        //Output distance 1
        Serial.println(distance);
        Serial.print("Distance 2 = ");        //Output distance 2 
        Serial.println(distance2);

        Serial.print("Connecting to: ");
        Serial.print(host);
        Serial.print(":");
        Serial.println(port);


        WiFiClient client;

if(!client.connect(host,port))
        {Serial.println("CONNECTION FAILED");
         delay(4000);
        return;
        }
        else{
      Serial.println("CONNECTED TO THE SERVER");
      client.print("GET /write_data.php?"); 
      client.print("DEPTH="); 
      client.print(distance);
      client.print("&DEPTH2=");
      client.print(distance2);
      client.print("&LAT=");
      client.print(lat_str);
      client.print("&LON=");
      client.print(lng_str);
      client.println(" HTTP/1.1");
      client.println("Host: 192.168.43.243"); 
      client.println("Connection: close"); 
      client.println();
  // Close the connection
      Serial.println();
      Serial.println("closing connection");
      client.stop();
      delay(10000);
  }
       
        
  }
  }



      
      }

      