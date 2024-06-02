<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" encoding="UTF-8" indent="yes"/>
  <xsl:template match="/">
    <html>
      <head>
        <title>CV de Coach</title>
        <style>
          body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f4f4f4;
          }
          .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          }
          h1, h2 {
            color: #333;
          }
          h1 {
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
          }
          h2 {
            border-bottom: 1px solid #666;
            padding-bottom: 5px;
            margin-top: 20px;
          }
          ul {
            list-style-type: none;
            padding: 0;
          }
          li {
            margin: 5px 0;
          }
          .profile {
            text-align: center;
          }
          .contact, .summary, .formations, .experiences, .skills, .languages {
            margin-top: 20px;
          }
        </style>
      </head>
      <body>
        <div class="container">
          <div class="profile">
            <h1><xsl:value-of select="cv/profile/name"/></h1>
          </div>
          <div class="contact">
            <h2>Contact</h2>
            <p>Email : <xsl:value-of select="cv/contact/email"/></p>
            <p>Téléphone : <xsl:value-of select="cv/contact/phone"/></p>
            <p>Adresse : <xsl:value-of select="cv/contact/address"/></p>
          </div>
          <div class="summary">
            <h2>Résumé</h2>
            <p><xsl:value-of select="cv/summary/p"/></p>
          </div>
          <div class="formations">
            <h2>Formations</h2>
            <ul>
              <xsl:for-each select="cv/formations/formation">
                <li><xsl:value-of select="."/></li>
              </xsl:for-each>
            </ul>
          </div>
          <div class="experiences">
            <h2>Expériences</h2>
            <ul>
              <xsl:for-each select="cv/experiences/experience">
                <li><xsl:value-of select="."/></li>
              </xsl:for-each>
            </ul>
          </div>
          <div class="skills">
            <h2>Compétences</h2>
            <ul>
              <xsl:for-each select="cv/skills/skill">
                <li><xsl:value-of select="."/></li>
              </xsl:for-each>
            </ul>
          </div>
          <div class="languages">
            <h2>Langues</h2>
            <ul>
              <xsl:for-each select="cv/languages/language">
                <li><xsl:value-of select="."/></li>
              </xsl:for-each>
            </ul>
          </div>
        </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
