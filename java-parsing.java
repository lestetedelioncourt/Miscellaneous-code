/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package earthquake;

import java.net.*;
import java.io.*;
import java.text.*;
import java.util.*;
import javax.xml.parsers.*;
import org.w3c.dom.*;
/**
 *
 * @author Leslie
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        ArrayList<Quake> earthquakes = getQuakes("http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_day.atom");
        
        System.out.println("TODAY'S EARTHQUAKES 2.5 AND HIGHER");
        SimpleDateFormat df = new SimpleDateFormat("HH:MM");
        System.out.printf("%s\t%-25s\t%s\t%s\n", "WHEN", "LAT / LONG", "MAGNITUDE", "DETAILS");
        for (Quake q : earthquakes){
            System.out.printf("%s\t%-25s\t%f\t%s\n", df.format(q.getDate()), q.getLocation(), q.getMagnitude(), q.getDetails());
        }
    }
        
        public static ArrayList<Quake> getQuakes(String url){
            ArrayList<Quake> quakes = new ArrayList<Quake>();
            try{
            URL eqcenterUrl = new URL(url);
            URLConnection connection = eqcenterUrl.openConnection();
            HttpURLConnection httpconnection = (HttpURLConnection) connection; 
            int responsecode = httpconnection.getResponseCode();
            if (responsecode == HttpURLConnection.HTTP_OK){
                InputStream in = httpconnection.getInputStream();
                
                DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();
                DocumentBuilder db = dbf.newDocumentBuilder();
                
                Document dom = db.parse(in);
                Element docElement = dom.getDocumentElement();
                NodeList n1 = docElement.getElementsByTagName("entry");
                //"entry" gets all nodes with tag <entry> from xml document
                if (n1 != null && n1.getLength() > 0){
                    for (int i = 0; i < n1.getLength(); i++){
                        Element entry = (Element) n1.item(i);
                        Element title = (Element) entry.getElementsByTagName("title").item(0);
                        Element g = (Element) entry.getElementsByTagName("georss:point").item(0);
                        Element when = (Element) entry.getElementsByTagName("updated").item(0);
                        Element link = (Element) entry.getElementsByTagName("link").item(0);
                        String details = title.getFirstChild().getNodeValue();
                        String hostname = "http://earthquake.usgs.gov";
                        String linkString = hostname + link.getAttribute("href");
                        
                        String point = g.getFirstChild().getNodeValue();
                        String dt = when.getFirstChild().getNodeValue();
                        SimpleDateFormat sdformat = new SimpleDateFormat("yyyy-MM-dd'T'hh:mm:ss.SSS'Z'");
                        Date qdate = new GregorianCalendar(0, 0, 0).getTime();
                        qdate = sdformat.parse(dt);
                        
                        String[] locationPair = point.split(" ");
                        String location = "Lat: " + locationPair[0] + "Lng: " + locationPair[1];
                        
                        String magnitudeString = details.split(" ")[1];
                        double magnitude = Double.parseDouble(magnitudeString);
                        
                        details = details.split("-")[1].trim();
                        
                        Quake q = new Quake(qdate, details, location, magnitude, linkString);
                        quakes.add(q);
                    }
                }
                
            }
            } catch (NumberFormatException e){
                System.out.printf("error: %s\n", e);
            } catch (Exception e){
                System.out.printf("error: %s", e);
            }
            return quakes;
        }
    }
    