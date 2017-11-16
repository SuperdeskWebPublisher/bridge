<?php

/*
 * This file is part of the Superdesk Web Publisher Bridge Component.
 *
 * Copyright 2016 Sourcefabric z.ú. and contributors.
 *
 * For the full copyright and license information, please see the
 * AUTHORS and LICENSE files distributed with this source code.
 *
 * @copyright 2016 Sourcefabric z.ú
 * @license http://www.superdesk.org/license
 */

namespace SWP\Component\Bridge\Validator;

class NinjsValidator extends JsonValidator
{
    protected $schema = '{
    "$schema": "http://json-schema.org/draft-03/schema#",
    "type" : "object",
    "title" : "IPTC ninjs - News in JSON - version 1.1 (approved, 2014-03-12) / document revision of 2014-11-15: geometry_* moved under place",
    "description" : "A news item as JSON object -- copyright 2014 IPTC - International Press Telecommunications Council - www.iptc.org - This document is published under the Creative Commons Attribution 3.0 license, see  http://creativecommons.org/licenses/by/3.0/  $$comment: as of 2014-03-13 ",
    "additionalProperties" : true,
    "patternProperties" : {
        "^description_[a-zA-Z0-9_]+" : {
            "description" : "A free-form textual description of the content of the item. (The string appended to description_ in the property name should reflect the format of the text)",
            "type" : "string"
        },
        "^body_[a-zA-Z0-9_]+" : {
            "description" : "The textual content of the news object. (The string appended to body_ in the property name should reflect the format of the text)",
            "type" : "string"
        }
    },
    "properties" : {
        "guid" : {
            "description" : "The identifier for this news object",
            "type" : "string",
            "format" : "guid",
            "required" : true
        },
        "type" : {
            "description" : "The generic news type of this news object",
            "type" : "string",
            "enum" : ["text", "audio", "video", "picture", "graphic", "composite"]
        },
        "slugline" : {
            "description" : "The slugline",
            "type" : "string"
        },
        "mimetype" : {
            "description" : "A MIME type which applies to this news object",
            "type" : "string"
        },
        "representationtype" : {
            "description" : "Indicates how complete this representation of a news item is",
            "type" : "string",
            "enum" : ["complete", "incomplete"]
        },
        "profile" : {
            "description" : "An identifier for the kind of content of this news object",
            "type" : "string"
        },
        "version" : {
            "description" : "The version of the news object which is identified by the uri property",
            "type" : "string"
        },
        "versioncreated" : {
            "description" : "The date and time when this version of the news object was created",
            "type" : "string",
            "format" : "date-time"
        },
        "firstcreated" : {
            "description" : "The date and time when the item was created",
            "type" : "string",
            "format" : "date-time"
        },
        "embargoed" : {
            "description" : "The date and time before which all versions of the news object are embargoed. If absent, this object is not embargoed.",
            "type" : "string",
            "format" : "date-time"
        },
        "pubstatus" : {
            "description" : "The publishing status of the news object, its value is *usable* by default.",
            "type" : "string",
            "enum" : ["usable", "withheld", "canceled"]
        },
        "urgency" : {
            "description" : "The editorial urgency of the content from 1 to 9. 1 represents the highest urgency, 9 the lowest.",
            "type" : "number"
        },
        "priority" : {
            "description" : "The editorial priority of the content from 1 to 9. 1 represents the highest priority, 9 the lowest.",
            "type" : "number"
        },
        "copyrightholder" : {
            "description" : "The person or organisation claiming the intellectual property for the content.",
            "type" : "string"
        },
        "copyrightnotice" : {
            "description" : "Any necessary copyright notice for claiming the intellectual property for the content.",
            "type" : "string"
        },
        "usageterms" : {
            "description" : "A natural-language statement about the usage terms pertaining to the content.",
            "type" : "string"
        },
        "language" : {
            "description" : "The human language used by the content. The value should follow IETF BCP47",
            "type" : "string"
        },
        "source" : {
            "description" : "The source of the news object",
            "type" : "string"
        },
        "service" : {
            "description" : "A service e.g. World Photos, UK News etc.",
            "type" : "array",
            "items" : {
                "type" : "object",
                "additionalProperties" : false,
                "properties" : {
                    "name" : {
                        "description" : "The name of a service",
                        "type" : "string"
                    },
                    "code" : {
                        "description": "The code for the service in a scheme (= controlled vocabulary) which is identified by the scheme property",
                        "type" : "string"
                    }
                }
            }
        },
        "genre" : {
            "description" : "A genre",
            "type" : "array",
            "items" : {
                "type" : "object",
                "additionalProperties" : false,
                "properties" : {
                    "name" : {
                        "description" : "The name of a genre",
                        "type" : "string"
                    },
                    "code" : {
                        "description": "The code for the genre in a scheme (= controlled vocabulary) which is identified by the scheme property",
                        "type" : "string"
                    }
                }
            }
        },
        "person" : {
            "description" : "An individual human being",
            "type" : "array",
            "items" : {
                "type" : "object",
                "additionalProperties" : false,
                "properties" : {
                    "name" : {
                        "description" : "The name of a person",
                        "type" : "string"
                    },
                    "rel" : {
                        "description" : "The relationship of the content of the news object to the person",
                        "type" : "string"
                    },
                    "scheme" : {
                        "description" : "The identifier of a scheme (= controlled vocabulary) which includes a code for the person",
                        "type" : "string",
                        "format" : "uri"
                    },
                    "code" : {
                        "description": "The code for the person in a scheme (= controlled vocabulary) which is identified by the scheme property",
                        "type" : "string"
                    }
                }
            }
        },
        "organisation" : {
            "description" : "An administrative and functional structure which may act as as a business, as a political party or not-for-profit party",
            "type" : "array",
            "items" : {
                "type" : "object",
                "additionalProperties" : false,
                "properties" : {
                    "name" : {
                        "description" : "The name of the organisation",
                        "type" : "string"
                    },
                    "rel" : {
                        "description" : "The relationship of the content of the news object to the organisation",
                        "type" : "string"
                    },
                    "scheme" : {
                        "description" : "The identifier of a scheme (= controlled vocabulary) which includes a code for the organisation",
                        "type" : "string",
                        "format" : "uri"
                    },
                    "code" : {
                        "description": "The code for the organisation in a scheme (= controlled vocabulary) which is identified by the scheme property",
                        "type" : "string"
                    },
                    "symbols" : {
                        "description" : "Symbols used for a finanical instrument linked to the organisation at a specific market place",
                        "type" : "array",
                        "items" : {
                            "type" : "object",
                            "additionalProperties" : false,
                            "properties" : {
                                "ticker" : {
                                    "description" : "Ticker symbol used for the financial instrument",
                                    "type": "string"
                                },
                                "exchange" : {
                                    "description" : "Identifier for the marketplace which uses the ticker symbols of the ticker property",
                                    "type" : "string"
                                }
                            }
                        }
                    }
                }
            }
        },
        "place" : {
            "description" : "A named location",
            "type" : "array",
            "items" : {
                "type" : "object",
                "additionalProperties" : false,
                "patternProperties" : {
                    "^geometry_[a-zA-Z0-9_]+" : {
                        "description" : "An object holding geo data of this place. Could be of any relevant geo data JSON object definition.",
                        "type" : "object"
                    }
                },
                "properties" : {
                    "name" : {
                        "description" : "The name of the place",
                        "type" : "string"
                    },
                    "rel" : {
                        "description" : "The relationship of the content of the news object to the place",
                        "type" : "string"
                    },
                    "scheme" : {
                        "description" : "The identifier of a scheme (= controlled vocabulary) which includes a code for the place",
                        "type" : "string",
                        "format" : "uri"
                    },
                    "code" : {
                        "description": "The code for the place in a scheme (= controlled vocabulary) which is identified by the scheme property",
                        "type" : "string"
                    },
                    "qcode" : {
                        "description": "The qcode for the place in a scheme (= controlled vocabulary) which is identified by the scheme property",
                        "type" : "string"
                    },
                    "state" : {
                        "description" : "The state for the place",
                        "type" : "string"
                    },
                    "group" : {
                        "description" : "The place group",
                        "type" : "string"
                    },
                    "country" : {
                        "description" : "The country name",
                        "type" : "string"
                    },
                    "world_region" : {
                        "description" : "The world region",
                        "type" : "string"
                    }
                }
            }
        },
        "subject" : {
            "description" : "A concept with a relationship to the content",
            "type" : "array",
            "items" : {
                "type" : "object",
                "additionalProperties" : false,
                "properties" : {
                    "name" : {
                        "description" : "The name of the subject",
                        "type" : "string"
                    },
                    "rel" : {
                        "description" : "The relationship of the content of the news object to the subject",
                        "type" : "string"
                    },
                    "scheme" : {
                        "description" : "The identifier of a scheme (= controlled vocabulary) which includes a code for the subject",
                        "type" : "string",
                        "format" : "uri"
                    },
                    "code" : {
                        "description": "The code for the subject in a scheme (= controlled vocabulary) which is identified by the scheme property",
                        "type" : "string"
                    }
                }
            }
        },
        "event" : {
            "description" : "Something which happens in a planned or unplanned manner",
            "type" : "array",
            "items" : {
                "type" : "object",
                "additionalProperties" : false,
                "properties" : {
                    "name" : {
                        "description" : "The name of the event",
                        "type" : "string"
                    },
                    "rel" : {
                        "description" : "The relationship of the content of the news object to the event",
                        "type" : "string"
                    },
                    "scheme" : {
                        "description" : "The identifier of a scheme (= controlled vocabulary) which includes a code for the event",
                        "type" : "string",
                        "format" : "uri"
                    },
                    "code" : {
                        "description": "The code for the event in a scheme (= controlled vocabulary) which is identified by the scheme property",
                        "type" : "string"
                    }
                }
            }
        },
        "object" : {
            "description" : "Something material, excluding persons",
            "type" : "array",
            "items" : {
                "type" : "object",
                "additionalProperties" : false,
                "properties" : {
                    "name" : {
                        "description" : "The name of the object",
                        "type" : "string"
                    },
                    "rel" : {
                        "description" : "The relationship of the content of the news object to the object",
                        "type" : "string"
                    },
                    "scheme" : {
                        "description" : "The identifier of a scheme (= controlled vocabulary) which includes a code for the object",
                        "type" : "string",
                        "format" : "uri"
                    },
                    "code" : {
                        "description": "The code for the object in a scheme (= controlled vocabulary) which is identified by the scheme property",
                        "type" : "string"
                    }
                }
            }
        },
        "byline" : {
            "description" : "The name(s) of the creator(s) of the content",
            "type" : "string"
        },
        "headline" : {
            "description" : "A brief and snappy introduction to the content, designed to catch the reader\'s attention",
            "type" : "string"
        },
        "located" : {
            "description" : "The name of the location from which the content originates.",
            "type" : "string"
        },
        "keywords": {
            "description" : "Content keywords",
            "type" : "array"
        },
        "evolvedfrom": {
            "description" : "The content of this item has evolved from related item with this guid.",
            "type" : "string"
        },
        "renditions" : {
            "description" : "Wrapper for different renditions of non-textual content of the news object",
            "type" : "object",
            "additionalProperties" : false,
            "patternProperties" : {
                "^[a-zA-Z0-9]+" : {
                    "description" : "A specific rendition of a non-textual content of the news object.",
                    "type" : "object",
                    "additionalProperties" : true,
                    "properties" : {
                        "href" : {
                            "description" : "The URL for accessing the rendition as a resource",
                            "type" : "string",
                            "format" : "uri"
                        },
                        "mimetype" : {
                            "description" : "A MIME type which applies to the rendition",
                            "type" : "string"
                        },
                        "title" : {
                            "description" : "A title for the link to the rendition resource",
                            "type" : "string"
                        },
                        "height" : {
                            "description" : "For still and moving images: the height of the display area measured in pixels",
                            "type" : "number"
                        },
                        "width" : {
                            "description" : "For still and moving images: the width of the display area measured in pixels",
                            "type" : "number"
                        },
                        "sizeinbytes" : {
                            "description" : "The size of the rendition resource in bytes",
                            "type" : "number"
                        },
                        "media" : {
                            "description": "Media object identifier",
                            "type" : "string",
                            "required" : true
                        }
                    }
                }
            }
        },
        "associations" : {
            "description" : "Content of news objects which are associated with this news object.",
            "type" : "object",
            "additionalProperties" : false,
            "patternProperties" : {
                "^[a-zA-Z0-9]+" :  { "$ref": "#" }
            }
        }
    }
}';

    /**
     * {@inheritdoc}
     */
    public function getFormat()
    {
        return 'ninjs';
    }
}
