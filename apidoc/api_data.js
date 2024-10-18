define({ "api": [{
    "type": "post",
    "url": "/blog/add",
    "title": "Add Blog.",
    "version": "0.1.0",
    "name": "Addblog",
    "group": "blog",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Api-Key",
            "description": "<p>Blog unique access-key.</p>"
          }
          ,
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Blog unique token.</p>"
          }
                  ]
      }
    },
    "permission": [
      {
        "name": "Blog Cant be Accessed permission name : api_blog_add"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
                    {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Slug",
            "description": "<p>Mandatory slug of Blogs Input Slug Max Length : 200..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Content",
            "description": "<p>Mandatory content of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Title",
            "description": "<p>Mandatory title of Blogs Input Title Max Length : 255..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Image",
            "description": "<p>Mandatory image of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Category",
            "description": "<p>Mandatory category of Blogs Input Category Max Length : 200..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Tags",
            "description": "<p>Mandatory tags of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Status",
            "description": "<p>Mandatory status of Blogs Input Status Max Length : 10..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Author",
            "description": "<p>Mandatory author of Blogs Input Author Max Length : 100..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Viewers",
            "description": "<p>Mandatory viewers of Blogs Input Viewers Max Length : 11..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Created_at",
            "description": "<p>Mandatory created_at of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Updated_at",
            "description": "<p>Mandatory updated_at of Blogs .</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>Error validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Blog.php",
    "groupTitle": "Blog"
  },
  {
    "type": "get",
    "url": "/blog/all",
    "title": "Get all Blogs.",
    "version": "0.1.0",
    "name": "Allblog",
    "group": "blog",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Api-Key",
            "description": "<p>Blogs unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Blogs unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "{} Cant be Accessed permission name : api_Blog_all"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
         
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Field",
            "defaultValue": "All Field",
            "description": "<p>Optional field of Blogs.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Start",
            "defaultValue": "0",
            "description": "<p>Optional start index of Blogs.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Limit",
            "defaultValue": "10",
            "description": "<p>Optional limit data of Blogs.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "Data",
            "description": "<p>data of Blog.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "NoDataBlog",
            "description": "<p>Blog data is nothing.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Blog.php",
    "groupTitle": "Blog"
  },
  {
    "type": "post",
    "url": "/Blog/delete",
    "title": "Delete Blog.",
    "version": "0.1.0",
    "name": "Deleteblog",
    "group": "blog",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Api-Key",
            "description": "<p>Blogs unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Blogs unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Blog Cant be Accessed permission name : api_Blog_delete"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "Id",
            "description": "<p>Mandatory id of Blogs .</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>Error validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Blog.php",
    "groupTitle": "Blog"
  },
  {
    "type": "get",
    "url": "/Blog/detail",
    "title": "Detail Blog.",
    "version": "0.1.0",
    "name": "Detailblog",
    "group": "blog",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Api-Key",
            "description": "<p>Blogs unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Blogs unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Blog Cant be Accessed permission name : api_Blog_detail"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "Id",
            "description": "<p>Mandatory id of Blogs.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "Data",
            "description": "<p>data of Blog.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "BlogNotFound",
            "description": "<p>Blog data is not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Blog.php",
    "groupTitle": "Blog"
  },
  {
    "type": "post",
    "url": "/Blog/update",
    "title": "Update Blog.",
    "version": "0.1.0",
    "name": "Updateblog",
    "group": "blog",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Api-Key",
            "description": "<p>Blogs unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Blogs unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Blog Cant be Accessed permission name : api_Blog_update"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
                    {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Slug",
            "description": "<p>Mandatory slug of Blogs Input Slug Max Length : 200..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Content",
            "description": "<p>Mandatory content of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Title",
            "description": "<p>Mandatory title of Blogs Input Title Max Length : 255..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Image",
            "description": "<p>Mandatory image of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Category",
            "description": "<p>Mandatory category of Blogs Input Category Max Length : 200..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Tags",
            "description": "<p>Mandatory tags of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Status",
            "description": "<p>Mandatory status of Blogs Input Status Max Length : 10..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Author",
            "description": "<p>Mandatory author of Blogs Input Author Max Length : 100..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Viewers",
            "description": "<p>Mandatory viewers of Blogs Input Viewers Max Length : 11..</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Created_at",
            "description": "<p>Mandatory created_at of Blogs .</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Updated_at",
            "description": "<p>Mandatory updated_at of Blogs .</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>Error validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Blog.php",
    "groupTitle": "Blog"
  }, {
    "type": "post",
    "url": "/group/add",
    "title": "Add Group.",
    "version": "0.1.0",
    "name": "AddGroup",
    "group": "Group",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-API-KEY",
            "description": "<p>Groups unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Groups unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Group Cant be Accessed permission name : api_group_add"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Name",
            "description": "<p>Mandatory name of Groups.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Definition",
            "description": "<p>Optional definition of Groups.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>Error validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Group.php",
    "groupTitle": "Group"
  },
  {
    "type": "get",
    "url": "/group/all",
    "title": "Get all groups.",
    "version": "0.1.0",
    "name": "AllGroup",
    "group": "Group",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-API-KEY",
            "description": "<p>Groups unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Groups unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Group Cant be Accessed permission name : api_group_all"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Filter",
            "defaultValue": "null",
            "description": "<p>Optional filter of Groups.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Field",
            "defaultValue": "All Field",
            "description": "<p>Optional field of Groups.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Start",
            "defaultValue": "0",
            "description": "<p>Optional start index of Groups.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Limit",
            "defaultValue": "10",
            "description": "<p>Optional limit data of Groups.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "Data",
            "description": "<p>data of group.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "NoDataGroup",
            "description": "<p>Group data is nothing.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Group.php",
    "groupTitle": "Group"
  },
  {
    "type": "post",
    "url": "/group/delete",
    "title": "Delete Group.",
    "version": "0.1.0",
    "name": "DeleteGroup",
    "group": "Group",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-API-KEY",
            "description": "<p>Groups unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Groups unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Group Cant be Accessed permission name : api_group_delete"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "Id",
            "description": "<p>Mandatory id of Groups .</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>Error validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Group.php",
    "groupTitle": "Group"
  },
  {
    "type": "get",
    "url": "/group/detail",
    "title": "Detail Group.",
    "version": "0.1.0",
    "name": "DetailGroup",
    "group": "Group",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-API-KEY",
            "description": "<p>Groups unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Groups unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Group Cant be Accessed permission name : api_group_detail"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "Id",
            "description": "<p>Mandatory id of Groups.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "Data",
            "description": "<p>data of group.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "GroupNotFound",
            "description": "<p>Group data is not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Group.php",
    "groupTitle": "Group"
  },
  {
    "type": "post",
    "url": "/group/update",
    "title": "Update Group.",
    "version": "0.1.0",
    "name": "UpdateGroup",
    "group": "Group",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-API-KEY",
            "description": "<p>Groups unique access-key.</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-Token",
            "description": "<p>Groups unique token.</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Group Cant be Accessed permission name : api_group_update"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Name",
            "description": "<p>Mandatory Name of Groups.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "Definition",
            "description": "<p>Optional definition of Groups.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "Status",
            "description": "<p>status response api.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>message response api.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>Error validation.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Not Acceptable",
          "type": "json"
        }
      ]
    },
    "filename": "application/controllers/api/Group.php",
    "groupTitle": "Group"
  },{
"type": "post",
"url": "/tag_location/add",
"title": "Add Tag location.",
"version": "0.1.0",
"name": "Addtag_location",
"group": "tag_location",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag location unique access-key.</p>"
}
]
}
},
"permission": [
{
"name": "Tag location Cant be Accessed permission name : api_tag_location_add"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Rfid_id",
  "description": "<p>Mandatory rfid_id of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Librarian_id",
  "description": "<p>Mandatory librarian_id of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Location_status",
  "description": "<p>Mandatory location_status of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": true,
  "field": "Location_created",
  "description": "<p>Optional location_created of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": true,
  "field": "Location_updated",
  "description": "<p>Optional location_updated of Tag locations .</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag_location.php",
"groupTitle": "Tag location"
},
{
"type": "get",
"url": "/tag_location/all",
"title": "Get all Tag locations.",
"version": "0.1.0",
"name": "Alltag_location",
"group": "tag_location",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag locations unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag locations unique token.</p>"
}
]
}
},
"permission": [
{
"name": "{} Cant be Accessed permission name : api_Tag location_all"
}
],
"parameter": {
"fields": {
"Parameter": [


{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Field",
"defaultValue": "All Field",
"description": "<p>Optional field of Tag locations.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Start",
"defaultValue": "0",
"description": "<p>Optional start index of Tag locations.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Limit",
"defaultValue": "10",
"description": "<p>Optional limit data of Tag locations.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_field",
"defaultValue": "location_id",
"description": "<p>Sort data by this field. location_id, rfid_id, librarian_id, location_status, location_aging, location_created, location_updated</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_order",
"defaultValue": "DESC",
"description": "<p>Sort data order this field ASC or DESC.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Filters",
"defaultValue": "",
"description": "<p>filters[0][lg] = <code>AND</code>, <code>OR</code><br>filters[0][co][0][fl] = <code>location_id</code><br>filters[0][co][0][op] = <code>equal</code>, <code>not_equal</code>, <code>greather</code>, <code>greather_equal</code>, <code>smaller_equal</code>, <code>smaller</code>, <code>is_null</code>, <code>not_null</code>, <code>where_in</code>, <code>where_not_in</code>, <code>like</code><br>filters[0][co][0][vl] = 1<br>filters[0][co][0][lg] = <code>OR</code>, <code>AND</code><br><br><br><span class=\"label \">Note</span> : if use like operator you need append <code>%your term%</code> on vl<br>for <code>BETWEEN</code> or <code>IN</code> you can use val1, val2, ..etc</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tag location.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "NoDataTag location",
"description": "<p>Tag location data is nothing.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag location.php",
"groupTitle": "Tag location"
},
{
"type": "post",
"url": "/tag_location/delete",
"title": "Delete Tag location.",
"version": "0.1.0",
"name": "Deletetag_location",
"group": "tag_location",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag locations unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag locations unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag location Cant be Accessed permission name : api_Tag location_delete"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tag locations .</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag location.php",
"groupTitle": "Tag location"
},
{
"type": "get",
"url": "/tag_location/detail",
"title": "Detail Tag location.",
"version": "0.1.0",
"name": "Detailtag_location",
"group": "tag_location",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag locations unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag locations unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag location Cant be Accessed permission name : api_Tag location_detail"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tag locations.</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tag location.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "Tag locationNotFound",
"description": "<p>Tag location data is not found.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag location.php",
"groupTitle": "Tag location"
},
{
"type": "post",
"url": "/tag_location/update",
"title": "Update Tag location.",
"version": "0.1.0",
"name": "Updatetag_location",
"group": "tag_location",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag locations unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag locations unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag location Cant be Accessed permission name : api_Tag location_update"
}
],
"parameter": {
"fields": {
"Parameter": [
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Rfid_id",
  "description": "<p>Mandatory rfid_id of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Librarian_id",
  "description": "<p>Mandatory librarian_id of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": false,
  "field": "Location_status",
  "description": "<p>Mandatory location_status of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": true,
  "field": "Location_created",
  "description": "<p>Optional location_created of Tag locations .</p>"
  },
  {
  "group": "Parameter",
  "type": "String",
  "optional": true,
  "field": "Location_updated",
  "description": "<p>Optional location_updated of Tag locations .</p>"
  }
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag location.php",
"groupTitle": "Tag location"
},{
"type": "post",
"url": "/tag_reader/add",
"title": "Add Tag reader.",
"version": "0.1.0",
"name": "Addtag_reader",
"group": "tag_reader",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag reader unique access-key.</p>"
}
,
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag reader unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag reader Cant be Accessed permission name : api_tag_reader_add"
}
],
"parameter": {
"fields": {
"Parameter": [
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag_reader.php",
"groupTitle": "Tag reader"
},
{
"type": "get",
"url": "/tag_reader/all",
"title": "Get all Tag readers.",
"version": "0.1.0",
"name": "Alltag_reader",
"group": "tag_reader",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag readers unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag readers unique token.</p>"
}
]
}
},
"permission": [
{
"name": "{} Cant be Accessed permission name : api_Tag reader_all"
}
],
"parameter": {
"fields": {
"Parameter": [


{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Field",
"defaultValue": "All Field",
"description": "<p>Optional field of Tag readers.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Start",
"defaultValue": "0",
"description": "<p>Optional start index of Tag readers.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Limit",
"defaultValue": "10",
"description": "<p>Optional limit data of Tag readers.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_field",
"defaultValue": "reader_id",
"description": "<p>Sort data by this field. reader_id, librarian_id, reader_name, reader_serialnumber, reader_type, reader_ip, reader_port, reader_com, reader_baudrate, reader_power, reader_interval, reader_mode, reader_updatedby, reader_updated, reader_createdby, reader_created</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Sort_order",
"defaultValue": "DESC",
"description": "<p>Sort data order this field ASC or DESC.</p>"
},
{
"group": "Parameter",
"type": "String",
"optional": true,
"field": "Filters",
"defaultValue": "",
"description": "<p>filters[0][lg] = <code>AND</code>, <code>OR</code><br>filters[0][co][0][fl] = <code>reader_id</code><br>filters[0][co][0][op] = <code>equal</code>, <code>not_equal</code>, <code>greather</code>, <code>greather_equal</code>, <code>smaller_equal</code>, <code>smaller</code>, <code>is_null</code>, <code>not_null</code>, <code>where_in</code>, <code>where_not_in</code>, <code>like</code><br>filters[0][co][0][vl] = 1<br>filters[0][co][0][lg] = <code>OR</code>, <code>AND</code><br><br><br><span class=\"label \">Note</span> : if use like operator you need append <code>%your term%</code> on vl<br>for <code>BETWEEN</code> or <code>IN</code> you can use val1, val2, ..etc</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tag reader.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "NoDataTag reader",
"description": "<p>Tag reader data is nothing.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag reader.php",
"groupTitle": "Tag reader"
},
{
"type": "post",
"url": "/tag_reader/delete",
"title": "Delete Tag reader.",
"version": "0.1.0",
"name": "Deletetag_reader",
"group": "tag_reader",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag readers unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag readers unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag reader Cant be Accessed permission name : api_Tag reader_delete"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tag readers .</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag reader.php",
"groupTitle": "Tag reader"
},
{
"type": "get",
"url": "/tag_reader/detail",
"title": "Detail Tag reader.",
"version": "0.1.0",
"name": "Detailtag_reader",
"group": "tag_reader",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag readers unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag readers unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag reader Cant be Accessed permission name : api_Tag reader_detail"
}
],
"parameter": {
"fields": {
"Parameter": [
{
"group": "Parameter",
"type": "Integer",
"optional": false,
"field": "Id",
"description": "<p>Mandatory id of Tag readers.</p>"
}
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
},
{
"group": "Success 200",
"type": "Array",
"optional": false,
"field": "Data",
"description": "<p>data of Tag reader.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "Tag readerNotFound",
"description": "<p>Tag reader data is not found.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag reader.php",
"groupTitle": "Tag reader"
},
{
"type": "post",
"url": "/tag_reader/update",
"title": "Update Tag reader.",
"version": "0.1.0",
"name": "Updatetag_reader",
"group": "tag_reader",
"header": {
"fields": {
"Header": [
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Api-Key",
"description": "<p>Tag readers unique access-key.</p>"
},
{
"group": "Header",
"type": "String",
"optional": false,
"field": "X-Token",
"description": "<p>Tag readers unique token.</p>"
}
]
}
},
"permission": [
{
"name": "Tag reader Cant be Accessed permission name : api_Tag reader_update"
}
],
"parameter": {
"fields": {
"Parameter": [
]
}
},
"success": {
"fields": {
"Success 200": [
{
"group": "Success 200",
"type": "Boolean",
"optional": false,
"field": "Status",
"description": "<p>status response api.</p>"
},
{
"group": "Success 200",
"type": "String",
"optional": false,
"field": "Message",
"description": "<p>message response api.</p>"
}
]
},
"examples": [
{
"title": "Success-Response:",
"content": "HTTP/1.1 200 OK",
"type": "json"
}
]
},
"error": {
"fields": {
"Error 4xx": [
{
"group": "Error 4xx",
"optional": false,
"field": "ValidationError",
"description": "<p>Error validation.</p>"
}
]
},
"examples": [
{
"title": "Error-Response:",
"content": "HTTP/1.1 403 Not Acceptable",
"type": "json"
}
]
},
"filename": "application/controllers/api/Tag reader.php",
"groupTitle": "Tag reader"
},{
  "type": "post",
  "url": "/user/add",
  "title": "Add User.",
  "version": "0.1.0",
  "name": "AddUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_add"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Username",
          "description": "<p>Mandatory username of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Email",
          "description": "<p>Mandatory email of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Password",
          "description": "<p>password of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "Array",
          "optional": true,
          "field": "Group",
          "defaultValue": "Default",
          "description": "<p>Optional group of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "File",
          "optional": true,
          "field": "Avatar",
          "defaultValue": "Default.PNG",
          "description": "<p>Optional avatar of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "ValidationError",
          "description": "<p>Error validation.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "get",
  "url": "/user/all",
  "title": "Get all users.",
  "version": "0.1.0",
  "name": "AllUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_all"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": true,
          "field": "Filter",
          "defaultValue": "null",
          "description": "<p>Optional filter of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": true,
          "field": "Field",
          "defaultValue": "All Field",
          "description": "<p>Optional field of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": true,
          "field": "Start",
          "defaultValue": "0",
          "description": "<p>Optional start index of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": true,
          "field": "Limit",
          "defaultValue": "10",
          "description": "<p>Optional limit data of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "Array",
          "optional": false,
          "field": "Data",
          "description": "<p>data of user.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "NoDataUser",
          "description": "<p>User data is nothing.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/delete",
  "title": "Delete User.",
  "version": "0.1.0",
  "name": "DeleteUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_delete"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "Integer",
          "optional": false,
          "field": "Id",
          "description": "<p>mandatory id of Users .</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "ValidationError",
          "description": "<p>Error validation.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "get",
  "url": "/user/detail",
  "title": "Detail User.",
  "version": "0.1.0",
  "name": "DetailUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_detail"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "Integer",
          "optional": false,
          "field": "Id",
          "description": "<p>Mandatory id of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "Array",
          "optional": false,
          "field": "Data",
          "description": "<p>data of user.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "UserNotFound",
          "description": "<p>User data is not found.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/login",
  "title": "User login authentication.",
  "version": "0.1.0",
  "name": "LoginUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "none"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Username",
          "description": "<p>Mandatory username of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Password",
          "description": "<p>Mandatory password of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "Array",
          "optional": false,
          "field": "Data",
          "description": "<p>data of user.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Token",
          "description": "<p>token for access api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "InvalidCredential",
          "description": "<p>The username or password is invalid.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/request_token",
  "title": "User request token.",
  "version": "0.1.0",
  "name": "RequestTokenUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "none"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Username",
          "description": "<p>Mandatory username of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Password",
          "description": "<p>Mandatory password of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Token",
          "description": "<p>token for access api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "InvalidCredential",
          "description": "<p>The username or password is invalid.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "get",
  "url": "/user/profile",
  "title": "Profile User.",
  "version": "0.1.0",
  "name": "ProfileUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_profile"
    }
  ],
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "Array",
          "optional": false,
          "field": "Data",
          "description": "<p>data of user.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "UserNotFound",
          "description": "<p>User data is not found.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/update_profile",
  "title": "Update Profile User.",
  "version": "0.1.0",
  "name": "UpdateProfileUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_update"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Email",
          "description": "<p>Mandatory email of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Password",
          "description": "<p>password of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "File",
          "optional": true,
          "field": "Avatar",
          "defaultValue": "Default.PNG",
          "description": "<p>Optional avatar of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "ValidationError",
          "description": "<p>Error validation.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/update",
  "title": "Update User.",
  "version": "0.1.0",
  "name": "UpdateUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_update"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Email",
          "description": "<p>Mandatory email of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Password",
          "description": "<p>password of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "Array",
          "optional": true,
          "field": "Group",
          "defaultValue": "Default",
          "description": "<p>Optional group of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "File",
          "optional": true,
          "field": "Avatar",
          "defaultValue": "Default.PNG",
          "description": "<p>Optional avatar of Users.</p>"
        },
        {
          "group": "Parameter",
          "type": "Integer",
          "optional": false,
          "field": "Id",
          "description": "<p>Mandatory id of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "ValidationError",
          "description": "<p>Error validation.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/remind_password",
  "title": "Update Remind password.",
  "version": "0.1.0",
  "name": "RemindPasswordUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_update"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Email",
          "description": "<p>Mandatory email of Users.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "ValidationError",
          "description": "<p>Error validation.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
},
{
  "type": "post",
  "url": "/user/reset_password",
  "title": "Update Reset Password.",
  "version": "0.1.0",
  "name": "ResetPasswordUser",
  "group": "User",
  "header": {
    "fields": {
      "Header": [
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-API-KEY",
          "description": "<p>Users unique access-key.</p>"
        },
        {
          "group": "Header",
          "type": "String",
          "optional": false,
          "field": "X-Token",
          "description": "<p>Users unique token.</p>"
        }
      ]
    }
  },
  "permission": [
    {
      "name": "Group Cant be Accessed permission name : api_user_update"
    }
  ],
  "parameter": {
    "fields": {
      "Parameter": [
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "Reset_token",
          "description": "<p>Token from e-mail.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "password",
          "description": "<p>New password.</p>"
        },
        {
          "group": "Parameter",
          "type": "String",
          "optional": false,
          "field": "password_confirmation",
          "description": "<p>New password confirmation.</p>"
        }
      ]
    }
  },
  "success": {
    "fields": {
      "Success 200": [
        {
          "group": "Success 200",
          "type": "Boolean",
          "optional": false,
          "field": "Status",
          "description": "<p>status response api.</p>"
        },
        {
          "group": "Success 200",
          "type": "String",
          "optional": false,
          "field": "Message",
          "description": "<p>message response api.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Success-Response:",
        "content": "HTTP/1.1 200 OK",
        "type": "json"
      }
    ]
  },
  "error": {
    "fields": {
      "Error 4xx": [
        {
          "group": "Error 4xx",
          "optional": false,
          "field": "ValidationError",
          "description": "<p>Error validation.</p>"
        }
      ]
    },
    "examples": [
      {
        "title": "Error-Response:",
        "content": "HTTP/1.1 403 Not Acceptable",
        "type": "json"
      }
    ]
  },
  "filename": "application/controllers/api/User.php",
  "groupTitle": "User"
}] });
