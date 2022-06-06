/*
* 	SHIKHAR SARAN SRIVASTAVA
*	201268
*/

package com.company.path.mapsservices.controller;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class ErrorController {

@RequestMapping("/error404")
protected String error404() {
    return "404.jsp";
}

@RequestMapping("/error505")
protected String error505() {
    return "404.shtml";
}
}
