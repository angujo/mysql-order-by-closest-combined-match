SELECT 
  art.id,
  art.title,art.`keywords` 
FROM
  std_article AS art 
WHERE art.source = 'main' 
  AND (
    keywords LIKE '%Ethics and Anti-Corruption Commission%' 
    OR keywords LIKE '%Nairobi County%' 
    OR keywords LIKE '%Corruption%'
  ) 
  AND art.id <> '2000187311' 
  AND (
    art.publishdate <= '2016-01-07 11:42:05' 
    AND art.publishdate >= '2015-12-18 11:42:00'
  ) 
  AND art.inactive IS NULL 
ORDER BY 
  CASE
    WHEN keywords REGEXP '(Ethics and Anti-Corruption Commission).*(Nairobi County).*(Corruption)' 
    THEN 0 
    WHEN keywords REGEXP '(Nairobi County).*(Corruption)' 
    THEN 1 
    WHEN keywords REGEXP '(Ethics and Anti-Corruption Commission).*(Nairobi County)' 
    THEN 2 
    WHEN keywords REGEXP '(Ethics and Anti-Corruption Commission).*(Corruption)' 
    THEN 3 
    WHEN keywords REGEXP '(Nairobi County)' 
    THEN 4 
    WHEN keywords REGEXP '(Ethics and Anti-Corruption Commission)' 
    THEN 5 
    WHEN keywords REGEXP '(Corruption)' 
    THEN 6 
  END,
  art.`publishday` DESC 
LIMIT 0, 4 
